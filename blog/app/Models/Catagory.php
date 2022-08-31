<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;

    public function posts(){
        // realtions type :
        // hasOne, hasMany, belongsTo, belongsToMany

        return $this->hasMany(Post::class);
    }
}
