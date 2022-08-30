<?php

namespace App\Models;

use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    // function to reads all the files from the posts/ and returns contents
    public static function all()
    {

        // // stores all the files in $files 
        // $files = File::files(resource_path("posts/"));

        // // returns contents of the files using array_map
        // return array_map(function ($files){
        //     return $files -> getContents();
        // }, $files);

        return collect(File::files(resource_path("posts/")))
            ->map(
                function ($file) {
                    return YamlFrontMatter::parseFile($file);
                }
            )

            ->map(
                function ($document) {
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug,
                    );
                }
            );
    }


    public static function find($slug)
    {
        // if (! file_exists($path = resource_path("posts/{$slug}.html"))){
        // it dislays a simple one line erroe
        // dd("file doesn't exist");

        // it displays a detailed version aslo know as dump, die, debug
        // ddd("File doesn't exst");

        // we can also redirect to home page
        // return redirect('/');

        // Displays 404 not found
        // abort(404);

        // throws model not found exception
        //     throw new RecordsNotFoundException();
        // }

        // we can also use now()-> addMinutes(20) or addDays() or ....... insted of 5 second
        // file system
        // caching
        // return cache()-> remember("posts.($slug)", 5, fn() => file_get_contents($path));

        // return view('post',['post' => $post]);

        // from all the blog post, find the one with a slug that matches the one that was requested

        $posts = static::all();

            return $posts->firstWhere('slug', $slug);
    }
}
