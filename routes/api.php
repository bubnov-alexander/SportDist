<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
Route::apiResource('routines', \App\Http\Controllers\Api\RoutineController::class);
Route::apiResource('workouts', \App\Http\Controllers\Api\WorkoutController::class);
Route::apiResource('exercises', \App\Http\Controllers\Api\ExerciseController::class);
Route::apiResource('workout-exercises', \App\Http\Controllers\Api\WorkoutExerciseController::class);
Route::apiResource('progress', \App\Http\Controllers\Api\ProgressController::class);
