<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Workout::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer',
            'is_completed' => 'boolean',
        ]);

        $workout = Workout::create($data);

        return response()->json($workout, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $workout = Workout::find($id);
        if (!empty($workout)) {
            return response()->json($workout);
        }
        return response()->json(['message' => 'Workout not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workout $workout)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'sometimes|required|integer',
            'is_completed' => 'boolean',
        ]);

        $workout->update($data);

        return response()->json($workout);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workout = Workout::find($id);
        if (!empty($workout)) {
            $workout->delete();
            return response()->json(null, 204);
        }
        return response()->json(['message' => 'Workout not found'], 404);
    }
}
