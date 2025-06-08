<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Routine::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',  // Указываем пользователя
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $routine = Routine::create($data);

        return response()->json($routine, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $routine = Routine::find($id);
        if (!empty($routine)) {
            return response()->json($routine);
        }
        return response()->json(['message' => 'Routine not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $routine = Routine::find($id);
        if (!empty($routine)) {
            $data = $request->validate([
                'user_id' => 'sometimes|exists:users,id',
                'title' => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $routine->update($data);

            return response()->json($routine);
        }

        return response()->json(['message' => 'Routine not found'], 404);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $routine = Routine::find($id);
        if (!empty($routine)) {
            $routine->delete();
            return response()->json(null, 204);
        }
        return response()->json(['message' => 'Routine not found'], 404);
    }
}
