<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        Exercise::insert([
            [
                'name' => 'Приседания',
                'description' => 'Классические приседания для ног',
                'muscle_group' => 'Ноги',
                'equipment' => 'Без оборудования',
                'duration_minutes' => 10,
            ],
            [
                'name' => 'Отжимания',
                'description' => 'Укрепление груди и трицепсов',
                'muscle_group' => 'Грудь',
                'equipment' => 'Без оборудования',
                'duration_minutes' => 8,
            ],
            [
                'name' => 'Планка',
                'description' => 'Статическое упражнение на пресс',
                'muscle_group' => 'Пресс',
                'equipment' => 'Коврик',
                'duration_minutes' => 5,
            ],
        ]);
    }
}
