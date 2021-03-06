<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutSequenceController;
use App\Http\Controllers\WorkoutSequenceExerciseController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('user', [UserController::class, 'store']);
Route::post('user/{id}', [UserController::class, 'update']);

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);

Route::get('assessments/{idUser}', [AssessmentController::class, 'index']);
Route::post('assessment', [AssessmentController::class, 'store']);
Route::post('assessment/{id}', [AssessmentController::class, 'update']);
Route::get('assessment/{id}', [AssessmentController::class, 'show']);
Route::delete('assessment/{id}', [AssessmentController::class, 'destroy']);

Route::get('workouts/{idUser}', [WorkoutController::class, 'index']);
Route::post('workout', [WorkoutController::class, 'store']);
Route::post('workout/{id}', [WorkoutController::class, 'update']);
Route::get('workout/{id}', [WorkoutController::class, 'show']);
Route::delete('workout/{id}', [WorkoutController::class, 'destroy']);

Route::get('workoutsequences/{idProject}', [WorkoutSequenceController::class, 'index']);
//Route::get('workoutsequences/{idUser}/{idProject}', [WorkoutSequenceController::class, 'search']);
Route::post('workoutsequence', [WorkoutSequenceController::class, 'store']);
Route::post('workoutsequence/{id}', [WorkoutSequenceController::class, 'update']);
Route::get('workoutsequence/{id}', [WorkoutSequenceController::class, 'show']);
Route::delete('workoutsequence/{id}', [WorkoutSequenceController::class, 'destroy']);

Route::get('workoutsequenceexercises/{idWorkoutSequence}', [WorkoutSequenceExerciseController::class, 'index']);
Route::post('workoutsequenceexercise', [WorkoutSequenceExerciseController::class, 'store']);
Route::post('workoutsequenceexercise/{id}', [WorkoutSequenceExerciseController::class, 'update']);
Route::get('workoutsequenceexercise/{id}', [WorkoutSequenceExerciseController::class, 'show']);
Route::delete('workoutsequenceexercise/{id}', [WorkoutSequenceExerciseController::class, 'destroy']);