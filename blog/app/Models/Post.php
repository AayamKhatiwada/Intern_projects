<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // it guards properties to be unchangable while mass assigning
    // protected $guarded = ['id'];

    // it only allows the fillable to properties to be mass assigned
    // protected $fillable = ['title', 'excerpt', 'body'];

    // It always include catagory and author during sql query and avoid lazy loading
    // protected $with = ['catagory','author']

    public function catagory()
    {
        // realtions type :
        // hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Catagory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function scopeFilter($query, array $filters)
    {  // Post::newQuery->filter()

        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                $query->where(
                    fn ($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%')
                );
            }
        );

        $query->when(
            $filters['author'] ?? false,
            function ($query, $author) {
                $query->whereHas(
                    'author',
                    fn ($query) =>
                    $query->where('userName', $author)

                );
            }
        );


        $query->when(
            $filters['catagory'] ?? false,
            function ($query, $catagory) {
                $query->whereHas(
                    'catagory',
                    fn ($query) =>
                    $query->where('slug', $catagory)

                );


                // $query->whereExists(
                //     fn ($query) =>
                //     $query->from('catagories')->whereColumn('catagories.id', 'posts.catagory_id')
                //         ->where('catagories.slug', $catagory)
                // );
            }
        );
    }
}
