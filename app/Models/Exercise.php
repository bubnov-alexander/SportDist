<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name Название тренировки
 * @property string|null $description Описание тренировки
 * @property string|null $muscle_group Группа мышц
 * @property string|null $equipment Оборудование
 * @property int|null $duration_minutes Длительность
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkoutExercise> $workoutExercises
 * @property-read int|null $workout_exercises_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereDurationMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereEquipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereMuscleGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Exercise whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Exercise extends Model
{
    protected $fillable = [
        'name',
        'description',
        'muscle_group',
        'equipment',
        'duration_minutes'
    ];

    public function workoutExercises(): HasMany
    {
        return $this->hasMany(WorkoutExercise::class);
    }

    public function getDurationMinutes(): ?int
    {
        return $this->duration_minutes;
    }

    public function setDurationMinutes(?int $duration_minutes): void
    {
        $this->duration_minutes = $duration_minutes;
    }

    public function getEquipment(): ?string
    {
        return $this->equipment;
    }

    public function setEquipment(?string $equipment): void
    {
        $this->equipment = $equipment;
    }

    public function getMuscleGroup(): ?string
    {
        return $this->muscle_group;
    }

    public function setMuscleGroup(?string $muscle_group): void
    {
        $this->muscle_group = $muscle_group;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWorkoutExercises(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->workoutExercises;
    }

    public function setWorkoutExercises(\Illuminate\Database\Eloquent\Collection $workoutExercises): void
    {
        $this->workoutExercises = $workoutExercises;
    }
}
