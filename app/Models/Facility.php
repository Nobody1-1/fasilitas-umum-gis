<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category','image', 'description', 'latitude','longitude', 'total_visits'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

