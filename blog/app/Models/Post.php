<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // it guards properties to be unchangable while mass assigning
    // protected $guarded = ['id'];

    // it only allows the fillable to properties to be mass assigned
    // protected $fillable = ['title', 'excerpt', 'body'];

    // It always include catagory and author during sql query
    // protected $with = ['catagory','author']

    public function catagory(){
        // realtions type :
        // hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Catagory::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

}