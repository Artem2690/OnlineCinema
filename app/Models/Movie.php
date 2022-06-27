<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function actors(){
        return $this->belongsToMany(Actor::class, 'actors_movie','movies_id', 'actors_id');
    }
    public function ganres(){
        return $this->belongsToMany(Actor::class, 'ganres_movies','movies_id', 'ganres_id');
    }
}
