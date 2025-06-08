<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $title Название
 * @property string|null $description Описание
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Routine whereUserId($value)
 * @mixin \Eloquent
 */
class Routine extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function user(): BelongsTo
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
