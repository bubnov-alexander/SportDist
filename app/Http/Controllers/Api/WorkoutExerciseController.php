<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;

class WorkoutExerciseController extends Controller
{
    public function index()
    {
        return response()->json(
            WorkoutExercise::with(['workout', 'exercise'])->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'exercise_id' => 'required|exists:exercises,id',
            'sets' => 'required|integer|min:1',
            'reps' => 'required|integer|min:1',
            'order' => 'nullable|integer|min:1',
        ]);

        $item = WorkoutExercise::create($data);

        return response()->json($item->load(['workout', 'exercise']), 201);
    }

    public function show(WorkoutExercise $workoutExercise)
    {
        return response()->json($workoutExercise->load(['workout', 'exercise']));
    }

    public function update(Request $request, WorkoutExercise $workoutExercise)
    {
        $data = $request->validate([
            'sets' => 'sometimes|required|integer|min:1',
            'reps' => 'sometimes|required|integer|min:1',
            'order' => 'sometimes|nullable|integer|min:1',
        ]);

        $workoutExercise->update($data);

        return response()->json($workoutExercise->load(['workout', 'exercise']));
    }

    public function destroy(WorkoutExercise $workoutExercise)
    {
        $workoutExercise->delete();
        return response()->json(null, 204);
    }
}
