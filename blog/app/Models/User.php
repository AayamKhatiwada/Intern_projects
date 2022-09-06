<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Also known as accessor
    // it uppercase the username first letter while fetching from the database
    // public function getUsernameAttribute($username){
    
    //     return ucwords($username);
    // }

    // also know as mutator
    // function to bcrypt the password while inserting to the database
    // public function setPasswordAttribute($password){
    // 
    //     $this->attribute['password'] = bcrypt($password);
    // }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
