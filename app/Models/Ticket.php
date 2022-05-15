<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "user_id",
        "status",
        "topic",
        "importance",
        "file",
        "parent_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replay(): HasMany
    {
        return $this->hasMany(Ticket::class, 'parent_id', 'id');

    }


}
