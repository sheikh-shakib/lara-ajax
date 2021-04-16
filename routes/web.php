<?php

use App\Http\Controllers\MSFormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;

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
//welcome
Route::get('/', function () {
    return view('welcome');
});

//auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user dataTable
Route::get('user', [UserController::class,'index'])->middleware('auth');
//insert by ajax
Route::get('/teacher',[TeacherController::class,'index']);
Route::post('/teacher',[TeacherController::class,'store'])->name('teacher.add');
//update by ajax
Route::get('/teacher/{id}',[TeacherController::class,'getTeacherById']);
Route::put('/teacher',[TeacherController::class,'updateTeacher'])->name('student.update');
//delete by ajax
Route::delete('/delete-teacher/{id}',[TeacherController::class,'deleteTeacher']);
Route::delete('/delete-selected',[TeacherController::class,'deleteSelected'])->name('select.delete');
//client side validation
Route::get('/register-parsly',[RegisterController::class,'index']);
Route::post('/register-parsly',[RegisterController::class,'store'])->name('parsly.store');
//infinite scroll
Route::get('/post',[PostController::class,'index']);
//multiple database connection
Route::get('/add-student',[StudentController::class,'addStudent']);
//multi-step-form
Route::get('/multi-step-form',[MSFormController::class,'index']);
