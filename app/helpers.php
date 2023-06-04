<?php

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

if(!function_exists("image_string")) {
    function image_string(Request $request, string &$fileNameToStore)
    {
        // Handle image upload
        if ($request->hasFile("image")) {
            // Get full name
            $fileNameWithExt = $request->file("image")->getClientOriginalName();
            // Get only name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extension
            $extension = $request->file("image")->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName . "_" . time() . "." . $extension;
            // Upload image
            $request->file("image")->storeAs("public/images", $fileNameToStore);
        }
    }
}

if(!function_exists("image_create")) {
    function image_create(Request $request, Model $model) {
        $fileNameToStore = "noimage.jpg";

        image_string($request, $fileNameToStore);

        $model->image = $fileNameToStore;
    }
}

if(!function_exists("image_update")) {
    function image_update(Request $request, Model $model) {
        $fileNameToStore = $model->image;

        image_string($request, $fileNameToStore);

        // Update image if image selected
        if($request->hasFile("image")) {
            image_delete($model);
            $model->image = $fileNameToStore;
        }
    }
}

if(!function_exists("image_delete")) {
    function image_delete(Model $model) {
        // Delete image if default not selected
        if($model->image !== "default_profile_picture.jpg") {
            Storage::delete("public/images/".$model->image);
        }
    }
}

if(!function_exists("update_password")) {
    function update_password(Model $user, $password) {
        // Update password if not empty
        if(!empty($password)) {
            $user->password = Hash::make($password);
        }
    }
}

if(!function_exists("increment_course")) {
    function increment_course(Model $student, Model $course) {
        if($course->type === "Compulsory") {
            $student->compulsory += 1;
        } else {
            $student->elective += 1;
        }
    }
}

if(!function_exists("decrement_course")) {
    function decrement_course(Model $student, Model $course) {
        if($course->type === "Compulsory") {
            $student->compulsory -= 1;
        } else {
            $student->elective -= 1;
        }
    }
}
