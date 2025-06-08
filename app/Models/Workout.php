<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkoutExercise> $workoutExercises
 * @property-read int|null $workout_exercises_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout query()
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $description
 * @property int $duration
 * @property int $is_completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Workout whereUserId($value)
 * @mixin \Eloquent
 */
class Workout extends Model
{
    protected $table = 'workouts';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'duration',
        'is_completed'
    ];

    protected $casts = [
        'is_completed' => 'boolean'
    ];

    public function workoutExercises(): HasMany
    {
        return $this->hasMany(WorkoutExercise::class);
    }

    public function getWorkoutExercises(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->workoutExercises;
    }

    public function setWorkoutExercises(\Illuminate\Database\Eloquent\Collection $workoutExercises): void
    {
        $this->workoutExercises = $workoutExercises;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getIsCompleted(): bool
    {
        return $this->is_completed;
    }

    public function setIsCompleted(bool $is_completed): void
    {
        $this->is_completed = $is_completed;
    }
}
