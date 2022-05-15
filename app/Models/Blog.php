<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method static GetBlogsTagThatUserSearchFor()
 * @method static GetBlogsCategoryThatUserSearchFor()
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "title","content","status","image","slug",
        "study_time","user_id","category_id"
    ];

    protected $with = ["user"];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,"blog_tag")->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return "slug";
    }

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }

    public function scopePublished($query)
    {
        return $query->where("status",TRUE);
    }

    public function scopeGetBlogsTagThatUserSearchFor($query)
    {
        return $query->whereHas("tags",function ($q){
           return $q->where("name",request()->get("tag"));
        });
    }

    public function scopeGetBlogsCategoryThatUserSearchFor($query)
    {
        $search = request()->get("category");
        $cat =  Category::where("name",$search)->first();

        return $cat->blogs();
    }

    public function addTags($tags)
    {
        return $this->tags()->attach($tags);
    }

    public function scopeGetRandomArticles($query,$blog)
    {
        return $query->where("title","!=",$blog->title)->inRandomOrder()->take(4)->get();
    }

    public function bookmarks(): MorphMany
    {
        return $this->morphMany(Bookmark::class,"bookmarkable");
    }

}
