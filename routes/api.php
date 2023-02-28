<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Attendance;
use app\Http\Controllers\Class;
use app\Http\Controllers\Course;
use app\Http\Controllers\Section;
use app\Http\Controllers\User;

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



Route::Post('/Attendance',[AttendanceController::class,'postAttendance']);
Route::Post('/Classs',[ClasssController::class,'postclasscontrollers']);
Route::Post('/Course',[CoursesController::class,'postcoursecontrollers']);
Route::Post('/Section',[SectionController::class,'postsectionsController']);

Route::Get('/Attendance/{id}',[AttendanceController::class,'getAttendance']);
Route::Get('/Classs/{id}',[ClasssController::class,'getClasss']);
Route::Get('/Course/{id}',[CoursesController::class,'getCourse']);
Route::Get('/Section/{id}',[SectionController::class,'getSection']);
