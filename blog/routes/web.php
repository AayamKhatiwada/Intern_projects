<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// basic routings and views
Route::get('/', function () {

    // using collection to store data

    // using foreach 

    // $posts = [];

    // foreach ($files as $file){
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug,
    //     );
    // }


    // $object = YamlFrontMatter::parseFile(
    //     resource_path('posts/my-first-post.html')
    // );

    // ddd($object -> title);

    // return Post::find('my-first-post');

    // calls Post::all
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {

    // find a post by its slug and pass it to a view called "post"
    // $post = Post::find($slug);

    return view('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[A-z_/-]+'); //constraints
