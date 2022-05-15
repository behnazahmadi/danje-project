<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","commentable_id","commentable_type","content","parent_id","status"];

    protected $with = ["user"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function childs(): HasMany
    {
        return $this->hasMany(Comment::class,"parent_id","id");
    }

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }

    public function scopePublished($query)
    {
        return $query->where("parent_id",0)->where("status",1);
    }

    public function scopeParentComment($query)
    {
        return $query->where("parent_id",0);
    }
}
