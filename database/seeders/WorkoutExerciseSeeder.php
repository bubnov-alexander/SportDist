<?php

namespace Database\Seeders;

use App\Models\WorkoutExercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutExerciseSeeder extends Seeder
{
    public function run(): void
    {
        WorkoutExercise::insert([
            [
                'workout_id' => 1,
                'exercise_id' => 1, // Приседания
                'sets' => 3,
                'reps' => 15,
                'order' => 1,
            ],
            [
                'workout_id' => 1,
                'exercise_id' => 2, // Отжимания
                'sets' => 3,
                'reps' => 10,
                'order' => 2,
            ],
            [
                'workout_id' => 2,
                'exercise_id' => 3, // Планка
                'sets' => 2,
                'reps' => 1,
                'order' => 1,
            ],
        ]);
    }
}

