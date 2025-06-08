<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Exercise::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'muscle_group' => 'nullable|string|max:255',
            'equipment' => 'nullable|string|max:255',
            'duration_minutes' => 'nullable|integer',
        ]);

        $exercise = Exercise::create($data);

        return response()->json($exercise, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $exercise = Exercise::find($id);
        if (!empty($exercise)) {
            return response()->json($exercise);
        }
        return response()->json(['message' => 'Exercise not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'muscle_group' => 'nullable|string|max:255',
            'equipment' => 'nullable|string|max:255',
            'duration_minutes' => 'nullable|integer',
        ]);

        $exercise->update($data);

        return response()->json($exercise);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $exercise = Exercise::find($id);
        if (!empty($exercise)) {
            $exercise->delete();
            return response()->json(null, 204);
        }
        return response()->json(['message' => 'Exercise not found'], 404);
    }
}
