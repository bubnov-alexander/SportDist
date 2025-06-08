<?php

namespace Database\Seeders;

use App\Models\Workout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        Workout::insert([
            [
                'user_id' => 1,
                'title' => 'Утренняя зарядка',
                'description' => 'Лёгкая тренировка на утро',
                'duration' => 30,
                'is_completed' => false,
            ],
            [
                'user_id' => 1,
                'title' => 'Кардио сессия',
                'description' => 'Интенсивная тренировка для сжигания калорий',
                'duration' => 45,
                'is_completed' => false,
            ],
        ]);
    }
}
