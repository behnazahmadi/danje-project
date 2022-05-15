<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name","parent_id","link","type"];

    public function blogs(): HasMany
    {
      return  $this->hasMany(Blog::class);
    }

    public function childs(): HasMany
    {
        return $this->hasMany(Category::class,"parent_id","id");
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }

    public function scopeParentCategory($query)
    {
        return $query->where("parent_id",0);
    }

}
