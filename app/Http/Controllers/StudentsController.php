<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function index(Request $request){
        // Authorize viewAny
        $this->authorize("viewAny", Student::class);

        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the courses table
        $students = Student::query()
            ->where("id", "!=", auth()->user()->id)
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy("name")
            ->paginate(5);

        // Return the search view with the results
        return view('students.index')->with("students", $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Authorize create
        $this->authorize("create", Student::class);

        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        // Authorize create
        $this->authorize("create", Student::class);

        //  Validate Request
        $validated = $request->validated();

        // Create new user
        $user = new User();
        $user->name = $validated["name"];
        $user->role = "Student";
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->save();

        // Create new student
        $student = new Student();
        $student->id = $user->id;
        $student->email = $validated["email"];
        $student->name = $validated["name"];
        $student->about = $validated["about"];
        $student->graduation_year = $validated["graduation_year"];
        $student->program = $validated["program"];
        image_create($request, $student);
        $student->save();

        return redirect("/admins")->with("success", "Student Created");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // Authorize view
        $this->authorize("view", $student);

        return view("students.show")->with("student", $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // Authorize update
        $this->authorize("update", $student);

        return view("students.edit")->with("student", $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        // Check if models exists
        $student = Student::findOrFail($id);
        $user = User::findOrFail($id);

        // Authorize update
        $this->authorize("update", $student);

        // Validate Request
        $validated = $request->validated();

        // Update user
        $user->name = $validated["name"];
        update_password($user, $validated["password"]);
        $user->save();

        // Update student
        $student->name = $validated["name"];
        $student->about = $validated["about"];
        $student->graduation_year = $validated["graduation_year"];
        $student->program = $validated["program"];
        image_update($request, $student);
        $student->save();

        return redirect("/students/$id")->with("success", "Profile Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if models exists
        $student = Student::findOrFail($id);
        $user = User::findOrFail($id);

        // Authorize delete
        $this->authorize("delete", $student);

        // Delete student
        image_delete($student);
        $student->delete();

        // If admin is deleting student
        if(auth()->user()->id !== $student->id) {
            $user->delete();
            return redirect("/admins")->with("success", "Student Deleted");
        }

        // Self-deletion
        auth()->logout();
        $user->delete();

        return redirect("/login")->with("success", "Account Deleted");
    }

    public function selected() {
        // Check if student exists
        $student = Student::findOrFail(auth()->user()->id);

        $courses_ids = array_reverse($student->courses);
        $courses = array();

        // Display selected courses
        foreach($courses_ids as $course_id) {
            $courses[] = Course::findOrFail($course_id);
        }

        return view("students.selected")->with("courses", $courses);
    }

    public function take(Request $request) {
        // Error
        $warnings = [];

        // Check if student exists
        $student = Student::findOrFail(auth()->user()->id);

        if($student->compulsory !== 3) {
            $warnings[] = "You have to select 3 compulsory courses";
        }

        if($student->elective !== 2) {
            $warnings[] = "You have to select 2 elective courses";
        }

        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the users table
        $courses = Course::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy("name")
            ->paginate(5);

        $courses_ids = $student->courses;

        return view("students.take", [
            "courses" => $courses,
            "courses_ids" => $courses_ids,
            "warnings" => $warnings,
        ]);
    }

    public function enroll($id) {
        // Check if models exist
        $student = Student::findOrFail(auth()->user()->id);
        $course = Course::findOrFaiL($id);

        $courses = $student->courses;

        // Add course id to selected courses
        if(in_array($id, $courses)) {
            return redirect("/students/take")->with("error", "You are already enrolled in that course");
        }

        $courses[] = $id;
        $student->courses = $courses;
        increment_course($student, $course);
        $student->save();

        return redirect("/students/take")->with("success", "Course enrollment successful !");
    }

    public function unenroll($id) {
        // Check if models exist
        $student = Student::findOrFail(auth()->user()->id);
        $course = Course::findOrFaiL($id);

        $courses = $student->courses;

        // Remove course id from selected courses
        if(!in_array($id, $courses)) {
            return redirect("/students/selected")->with("error", "You are not enrolled in that course");
        }

        $id = array_search($id, $courses);

        unset($courses[$id]);
        $student->courses = $courses;
        decrement_course($student, $course);
        $student->save();

        return redirect("/students/selected")->with("success", "Course drop successful !");
    }
}
