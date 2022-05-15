<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static GalleriesCategoryThatUserSearchFor()
 */
class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ["image","title","category_id"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }

    public function scopeGalleriesCategoryThatUserSearchFor($query)
    {
        $search = request()->get("category");
        $cat = Category::where("name",$search)->first();

        return $cat->galleries();
    }

}
