<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $workout_id
 * @property string $performed_at Выполнено в
 * @property int $duration Продолжительность
 * @property int|null $calories_burned Калории_сожжены
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereCaloriesBurned($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress wherePerformedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Progress whereWorkoutId($value)
 * @mixin \Eloquent
 */
class Progress extends Model
{
    protected $fillable = [
        'user_id',
        'workout_id',
        'performed_at',
        'duration',
        'calories_burned'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workout(): BelongsTo
    {
        return $this->belongsTo(Workout::class);
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getWorkoutId(): int
    {
        return $this->workout_id;
    }

    public function setWorkoutId(int $workout_id): void
    {
        $this->workout_id = $workout_id;
    }

    public function getPerformedAt(): string
    {
        return $this->performed_at;
    }

    public function setPerformedAt(string $performed_at): void
    {
        $this->performed_at = $performed_at;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    public function getCaloriesBurned(): ?int
    {
        return $this->calories_burned;
    }

    public function setCaloriesBurned(?int $calories_burned): void
    {
        $this->calories_burned = $calories_burned;
    }
}
