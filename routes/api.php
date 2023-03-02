<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeSectionController;
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

///////////////sanctum auth ///////////////
//login
Route::post('/user/login',[UserController::class,'login']);
//logout
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/user/logout',[UserController::class,'logout']);
    });

    






Route::get('/grade/{id}',[GradeController::class,'getGradeById']);
Route::get('/grade',[GradeController::class,'getGrade']);
Route::post('/grade',[GradeController::class,'addGrade']);
Route::delete('/grade/{id}',[GradeController::class,'deleteGrade']);
Route::put('/grade/{id}',[GradeController::class,'updateGrade']);



Route::get('/gradeSection/{id}',[GradeSectionController::class,'getGradeSectionById']);
Route::post('/gradeSection',[GradeSectionController::class,'addGradeSection']);
Route::delete('/gradeSection/{id}',[GradeSectionController::class,'deleteGradeSection']);
Route::patch('/gradeSection/{id}',[GradeSectionController::class,'updateGradeSection']);


Route::get('/allUser',[UserController::class,'getAllUsers']);
Route::get('/user/{id}',[UserController::class,'getUserById']);

//register
// Route::post('/register',[UserController::class,'register']);

Route::post('/user',[UserController::class,'addUser']);
////////
Route::put('/user/{id}',[UserController::class,'updateUser']);
Route::delete('/user/{id}',[UserController::class,'deleteUser']);
Route::get('/teacher',[UserController::class,'getTeacher']);
Route::get('/student',[UserController::class,'getStudents']);
Route::get('/userss/{firstName}',[UserController::class,'getUserByName']);


/**********Attendance */
Route::post('/attendance/{id}',[AttendanceController::class,'createAttendance']);
Route::get('/attendance',[AttendanceController::class,'getAll']);
Route::get('/attendance/student/{id}',[AttendanceController::class,'getByStudent']);
Route::get('/attendance/gradeSection/{id}',[AttendanceController::class,'getByGradeSectionId']);


/*********Course */
Route::post('/course',[CourseController::class,'createCourse']);
Route::get('/course/getAll',[CourseController::class,'getAllCourses']);
Route::get('/course/{id}',[CourseController::class,'getCourse']);
Route::delete('deleteById/{id}',[CourseController::class,'deleteById']);


/*******Section ****/
Route::Get('/section', [SectionController::class, 'getSection']);
Route::Get('/section/{id}', [SectionController::class, 'getSingleSection']);
Route::Post('/addsection', [SectionController::class, 'addSection']);
Route::Patch('/updatesection/{id}', [SectionController::class, 'updateSection']);
Route::Delete('/section/{id}', [SectionController::class, 'deleteSection']);
