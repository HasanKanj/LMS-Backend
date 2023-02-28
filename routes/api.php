<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/userLMS/{id}',[UserController::class,'getUser']);
Route::post('/userteacher',[UserController::class,'addUser']);
// Route::post('/course',[UserController::class,'addCourse']);
Route::post('/capacity',[UserController::class,'addCapacity']);
Route::delete('/userteacher/{id}',[UserController::class,'deleteUser']);







Route::get('/grade/{id}',[GradeController::class,'getGradeById']);
Route::post('/grade',[GradeController::class,'addGrade']);
Route::delete('/grade/{id}',[GradeController::class,'deleteGrade']);
Route::patch('/grade/{id}',[GradeController::class,'updateGrade']);



Route::get('/gradeSection/{id}',[GradeSectionController::class,'getGradeSectionById']);
Route::post('/gradeSection',[GradeSectionController::class,'addGradeSection']);
Route::delete('/gradeSection/{id}',[GradeSectionController::class,'deleteGradeSection']);
Route::patch('/gradeSection/{id}',[GradeSectionController::class,'updateGradeSection']);

