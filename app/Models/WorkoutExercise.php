<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $workout_id
 * @property int $exercise_id
 * @property int $sets
 * @property int $reps
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exercise $exercise
 * @property-read \App\Models\Workout $workout
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereExerciseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereReps($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereSets($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkoutExercise whereWorkoutId($value)
 * @mixin \Eloquent
 */
class WorkoutExercise extends Model
{
    protected $fillable = [
        'workout_id',
        'exercise_id',
        'sets',
        'reps',
        'order'
    ];

    public function workout(): BelongsTo
    {
        return $this->belongsTo(Workout::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function getSets(): int
    {
        return $this->sets;
    }

    public function setSets(int $sets): void
    {
        $this->sets = $sets;
    }

    public function getWorkoutId(): int
    {
        return $this->workout_id;
    }

    public function setWorkoutId(int $workout_id): void
    {
        $this->workout_id = $workout_id;
    }

    public function getExerciseId(): int
    {
        return $this->exercise_id;
    }

    public function setExerciseId(int $exercise_id): void
    {
        $this->exercise_id = $exercise_id;
    }

    public function getReps(): int
    {
        return $this->reps;
    }

    public function setReps(int $reps): void
    {
        $this->reps = $reps;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    public function getExercise(): Exercise
    {
        return $this->exercise;
    }

    public function setExercise(Exercise $exercise): void
    {
        $this->exercise = $exercise;
    }

    public function getWorkout(): Workout
    {
        return $this->workout;
    }

    public function setWorkout(Workout $workout): void
    {
        $this->workout = $workout;
    }
}
