<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProgressSeeder extends Seeder
{
    public function run(): void
    {
        Progress::insert([
            [
                'user_id' => 1,
                'workout_id' => 1,
                'performed_at' => Carbon::now()->subDays(1),
                'duration' => 30,
                'calories_burned' => 220,
            ],
            [
                'user_id' => 1,
                'workout_id' => 2,
                'performed_at' => Carbon::now()->subDays(2),
                'duration' => 45,
                'calories_burned' => 350,
            ],
        ]);
    }
}
