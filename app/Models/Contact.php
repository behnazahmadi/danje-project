<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ["name","email","content","status","topic","importance","parent_id"];

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }
}
