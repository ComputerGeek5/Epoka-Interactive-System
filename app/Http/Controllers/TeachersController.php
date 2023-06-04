<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Student;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeachersController extends Controller
{
    public function index(Request $request){
        // Authorize viewAny
        $this->authorize("viewAny", Teacher::class);

        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the courses table
        $teachers = Teacher::query()
            ->where("id", "!=", auth()->user()->id)
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy("name")
            ->paginate(5);

        // Return the search view with the results
        return view('teachers.index')->with("teachers", $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Authorize create
        $this->authorize("create", Teacher::class);

        return view("teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherStoreRequest $request)
    {
        // Authorize create
        $this->authorize("create", Teacher::class);

        // Validate Request
        $validated = $request->validated();

        // Create New User
        $user = new User();
        $user->name = $validated["name"];
        $user->role = "Teacher";
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->save();

        // Create New Teacher
        $teacher = new Teacher();
        $teacher->id = $user->id;
        $teacher->name = $validated["name"];
        $teacher->email = $validated["email"];
        $teacher->about = $validated["about"];
        $teacher->title = $validated["title"];
        $teacher->faculty = $validated["faculty"];
        image_create($request, $teacher);
        $teacher->save();

        return redirect("/admins")->with("success", "Teacher Created");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        // Authorize view
        $this->authorize("view", $teacher);

        return view("teachers.show")->with("teacher", $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        // Authorize update
        $this->authorize("update", $teacher);

        return view("teachers.edit")->with("teacher", $teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $request, $id)
    {
        // Check if models exist
        $teacher = Teacher::findOrFail($id);
        $user = User::findOrFail($id);

        // Authorize update
        $this->authorize("update", $teacher);

        // Validate Request
        $validated = $request->validated();

        // Update user
        $user->name = $validated["name"];
        update_password($user, $validated["password"]);
        $user->save();

        // Update teacher
        $teacher->name = $validated["name"];
        $teacher->title = $validated["title"];
        $teacher->faculty = $validated["faculty"];
        $teacher->about = $validated["about"];
        image_update($request, $teacher);
        $teacher->save();

        return redirect("/teachers/$id")->with("success", "Profile Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if models exist
        $teacher = Teacher::findOrFail($id);
        $user = User::findOrFail($id);

        // Authorize delete
        $this->authorize("delete", $teacher);

        // Unenroll all students from this teacher's courses
        $students = Student::all();
        $courses = $teacher->courses;

        foreach($courses as $course) {
            foreach ($students as $student) {
                $selected = $student->courses;

                if (in_array($course->id, $selected)) {
                    $selected_id = array_search($course->id, $selected);
                    unset($selected[$selected_id]);
                    $student->courses = $selected;
                    decrement_course($student, $course);
                    $student->save();
                }
            }
            $course->delete();
        }

        // Delete teacher
        image_delete($teacher);
        $teacher->delete();

        // If admin deletes teacher
        if(auth()->user()->id !== $teacher->id) {
            $user->delete();
            return redirect("/admins")->with("success", "Teacher Deleted");
        }

        // Self-deletion
        auth()->logout();
        $user->delete();

        return redirect("/login")->with("success", "Account Deleted");
    }
}
