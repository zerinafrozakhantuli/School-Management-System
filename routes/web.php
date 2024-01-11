<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\RecycleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard', [AdminController::class, 'index']);

Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit', [UserController::class, 'edit']);
Route::get('dashboard/user/view', [UserController::class, 'view']);
Route::post('dashboard/user/submit', [UserController::class, 'insert']);
Route::post('dashboard/user/update', [UserController::class, 'update']);
Route::post('dashboard/user/softdelete', [UserController::class, 'softdelete']);
Route::post('dashboard/user/restore', [UserController::class, 'restore']);
Route::post('dashboard/user/delete', [UserController::class, 'delete']);

Route::get('dashboard/classlist', [ClassController::class, 'index']);
Route::get('dashboard/classlist/add', [ClassController::class, 'add']);
Route::get('dashboard/classlist/edit/{slug}', [ClassController::class, 'edit']);
Route::get('dashboard/classlist/view/{slug}', [ClassController::class, 'view']);
Route::post('dashboard/classlist/submit', [ClassController::class, 'insert']);
Route::post('dashboard/classlist/update', [ClassController::class, 'update']);
Route::post('dashboard/classlist/softdelete', [ClassController::class, 'softdelete']);
Route::post('dashboard/classlist/restore', [ClassController::class, 'restore']);
Route::post('dashboard/classlist/delete', [ClassController::class, 'delete']);

Route::get('dashboard/admission', [AdmissionController::class, 'index']);
Route::get('dashboard/admission/add', [AdmissionController::class, 'add']);
Route::get('dashboard/admission/edit', [AdmissionController::class, 'edit']);
Route::get('dashboard/admission/view', [AdmissionController::class, 'view']);
Route::post('dashboard/admission/submit', [AdmissionController::class, 'insert']);
Route::post('dashboard/admission/update', [AdmissionController::class, 'update']);
Route::post('dashboard/admission/softdelete', [AdmissionController::class, 'softdelete']);
Route::post('dashboard/admission/restore', [AdmissionController::class, 'restore']);
Route::post('dashboard/admission/delete', [AdmissionController::class, 'delete']);


Route::get('dashboard/student', [StudentController::class, 'index']);
Route::get('dashboard/student/add', [StudentController::class, 'add']);
Route::get('dashboard/student/edit', [StudentController::class, 'edit']);
Route::get('dashboard/student/view', [StudentController::class, 'view']);
Route::post('dashboard/student/submit', [StudentController::class, 'insert']);
Route::post('dashboard/student/update', [StudentController::class, 'update']);
Route::post('dashboard/student/softdelete', [StudentController::class, 'softdelete']);
Route::post('dashboard/student/restore', [StudentController::class, 'restore']);
Route::post('dashboard/student/delete', [StudentController::class, 'delete']);

Route::get('dashboard/teacher', [TeacherController::class, 'index']);
Route::get('dashboard/teacher/add', [TeacherController::class, 'add']);
Route::get('dashboard/teacher/edit', [TeacherController::class, 'edit']);
Route::get('dashboard/teacher/view', [TeacherController::class, 'view']);
Route::post('dashboard/teacher/submit', [TeacherController::class, 'insert']);
Route::post('dashboard/teacher/update', [TeacherController::class, 'update']);
Route::post('dashboard/teacher/softdelete', [TeacherController::class, 'softdelete']);
Route::post('dashboard/teacher/restore', [TeacherController::class, 'restore']);
Route::post('dashboard/teacher/delete', [TeacherController::class, 'delete']);

Route::get('dashboard/alumni', [AlumniController::class, 'index']);
Route::get('dashboard/alumni/add', [AlumniController::class, 'add']);
Route::get('dashboard/alumni/edit', [AlumniController::class, 'edit']);
Route::get('dashboard/alumni/view', [AlumniController::class, 'view']);
Route::post('dashboard/alumni/submit', [AlumniController::class, 'insert']);
Route::post('dashboard/alumni/update', [AlumniController::class, 'update']);
Route::post('dashboard/alumni/softdelete', [AlumniController::class, 'softdelete']);
Route::post('dashboard/alumni/restore', [AlumniController::class, 'restore']);
Route::post('dashboard/alumni/delete', [AlumniController::class, 'delete']);

Route::get('dashboard/parent', [ParentController::class, 'index']);
Route::get('dashboard/parent/add', [ParentController::class, 'add']);
Route::get('dashboard/parent/edit', [ParentController::class, 'edit']);
Route::get('dashboard/parent/view', [ParentController::class, 'view']);
Route::post('dashboard/parent/submit', [ParentController::class, 'insert']);
Route::post('dashboard/parent/update', [ParentController::class, 'update']);
Route::post('dashboard/parent/softdelete', [ParentController::class, 'softdelete']);
Route::post('dashboard/parent/restore', [ParentController::class, 'restore']);
Route::post('dashboard/parent/delete', [ParentController::class, 'delete']);


Route::get('dashboard/recycle', [RecycleController::class, 'index']);
Route::get('dashboard/recycle/classlist', [RecycleController::class, 'cls_list']);


require __DIR__.'/auth.php';
