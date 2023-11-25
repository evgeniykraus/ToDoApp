<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property User $user
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
