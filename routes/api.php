<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/userLMS/{id}', [UserController::class, 'getUser']);
Route::post('/userteacher', [UserController::class, 'addUser']);
// Route::post('/course',[UserController::class,'addCourse']);
Route::post('/capacity', [UserController::class, 'addCapacity']);
Route::delete('/userteacher/{id}', [UserController::class, 'deleteUser']);

/*******Section ****/
Route::Get('/section', [SectionController::class, 'getSection']);
Route::Get('/section/{id}', [SectionController::class, 'getSingleSection']);
Route::Post('/addsection', [SectionController::class, 'addSection']);
Route::Patch('/updatesection/{id}', [SectionController::class, 'updateSection']);
Route::Delete('/section/{id}', [SectionController::class, 'deleteSection']);
