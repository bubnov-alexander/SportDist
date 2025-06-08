<?php

namespace Database\Seeders;

use App\Models\Routine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    public function run(): void
    {
        Routine::insert([
            [
                'user_id' => 1,
                'title' => '5-дневный фитнес план',
                'description' => 'Сбалансированная программа тренировок',
            ],
        ]);
    }
}
