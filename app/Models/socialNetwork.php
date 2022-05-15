<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialNetwork extends Model
{
    use HasFactory;

    protected $fillable = ["link","logo","name","classIcon"];

    protected $table = "social_networks";

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }


}
