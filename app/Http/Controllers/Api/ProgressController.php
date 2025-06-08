<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
        return response()->json(
            Progress::with(['user', 'workout'])->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'workout_id' => 'required|exists:workouts,id',
            'performed_at' => 'required|date',
            'duration' => 'required|integer|min:1',
            'calories_burned' => 'nullable|integer|min:0',
        ]);

        $progress = Progress::create($data);

        return response()->json($progress->load(['user', 'workout']), 201);
    }

    public function show(Progress $progress)
    {
        return response()->json($progress->load(['user', 'workout']));
    }

    public function update(Request $request, Progress $progress)
    {
        $data = $request->validate([
            'performed_at' => 'sometimes|date',
            'duration' => 'sometimes|integer|min:1',
            'calories_burned' => 'nullable|integer|min:0',
        ]);

        $progress->update($data);

        return response()->json($progress->load(['user', 'workout']));
    }

    public function destroy(Progress $progress)
    {
        $progress->delete();
        return response()->json(null, 204);
    }
}
