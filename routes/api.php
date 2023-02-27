<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::Post('/teacher',[TeacherController::class,'AddTeacher']);
Route::Get('/getteacher/{id}',[TeacherController::class,'getTeacher']);
Route::Delete('/deleteTeacher/{id}',[TeacherController::class,'deleteTeacher']);
Route::Get('teacher/search/{first_name}',[TeacherController::class,'search']);
// Route::Get('/course',[CourseController::Class,'index']);
// Route::Post('/course',[CourseController::CLass,'store']);
Route::resource('course',CourseController::class);
Route::Get('course/search/{name}',[CourseController::class,'search']);