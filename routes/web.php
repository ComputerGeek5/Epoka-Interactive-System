<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);
Route::middleware(["auth"])->group(function() {
    Route::get('/', [PagesController::class, "index"])->name("index");
    Route::prefix("/students")->group(function() {
        Route::get("/take", [StudentsController::class, "take"])->name("students.take");
        Route::get("/selected", [StudentsController::class, "selected"])->name("students.selected");
        Route::get("/enroll/{course}", [StudentsController::class, "enroll"])->name("students.enroll");
        Route::get("/unenroll/{course}", [StudentsController::class, "unenroll"])->name("students.unenroll");
    });
    Route::prefix("/teachers")->group(function() {
        Route::resource("/courses", CoursesController::class);
    });
    Route::resources([
        "/admins" => AdminsController::class,
        "/students" => StudentsController::class,
        "/teachers" => TeachersController::class,
    ]);
});

