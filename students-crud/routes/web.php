<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;


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
    return view('index');
});

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/create', [StudentController::class, 'create']);

Route::get('students/{id}', [StudentController::class, 'show'])
    ->whereNumber('id');

Route::post('students/{id}', [StudentController::class, 'update'])
    ->whereNumber('id');

Route::get('students/{id}/edit', [StudentController::class, 'edit'])
    ->whereNumber('id');

Route::get('students/{id}/delete', [StudentController::class, 'destroy'])
    ->whereNumber('id');

Route::post('students/{id}/add-course', [StudentController::class, 'addCourse'])
    ->whereNumber('id');
