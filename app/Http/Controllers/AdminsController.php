<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index(Request $request){
        // Authorize viewAny
        $this->authorize("viewAny", Admin::class);

        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the users table
        $users = User::query()
            ->where("id", "!=", auth()->user()->id)
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy("name")
            ->paginate(5);

        // Return the search view with the results
        return view('admins.index')->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Authorize create
        $this->authorize("create", Admin::class);

        return view("admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request)
    {
        // Authorize create
        $this->authorize("create", Admin::class);

        // Validate Request
        $validated = $request->validated();

        // Create New User
        $user = new User();
        $user->name = $validated["name"];
        $user->role = "ADMIN";
        $user->email = $validated["email"];
        $user->password = Hash::make($validated["password"]);
        $user->save();

        // Create New Admin
        $admin = new Admin();
        $admin->id = $user->id;
        $admin->name = $validated["name"];
        $admin->email = $validated["email"];
        image_create($request, $admin);
        $admin->save();

        return redirect("/admins")->with("success", "Admin Created");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        // Authorize view
        $this->authorize("view", $admin);

        return view("admins.show")->with("admin", $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        // Authorize update
        $this->authorize("update", $admin);

        return view("admins.edit")->with("admin", $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        // Check if models exists
        $admin = Admin::findOrFail($id);
        $user = User::findOrFail($id);

        // Authorize update
        $this->authorize("update", $admin);

        // Validate Request
        $validated = $request->validated();

        // Update User
        $user->name = $validated["name"];
        update_password($user, $validated["password"]);
        $user->save();

        // Update admin
        $admin->name = $validated["name"];
        image_update($request, $admin);
        $admin->save();

        return redirect("/admins/$id")->with("success", "Profile Updated");
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
        $user = User::findOrFail($id);
        $admin = Admin::findOrFail($id);

        // Authorize delete
        $this->authorize("delete", $admin);

        // Delete account and logout
        image_delete($admin);
        $admin->delete();
        auth()->logout();
        $user->delete();

        return redirect("/login")->with("success", "Account Deleted");
    }
}
