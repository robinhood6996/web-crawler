<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AssignArticle extends Model
{
    use HasFactory;
    protected $casts = [
        'origin_id' => 'integer',
    ];

    public function origin(): MorphTo
    {
        return $this->morphTo();
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
