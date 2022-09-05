<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

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
Route::get('/', 
    // function () {

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

    // it listens all the mysql query and shows in storage/logs/laravel.log
    // DB::listen(function ($query){
    //     logger($query->sql, $query->bindings);
    // });

    // $posts = Post::latest();

    // if (request('search')) {
    //     $posts->where('title', 'like', '%'. request('search'). '%')
    //     ->orWhere('body','like', '%'.request('search').'%');
    // }

    // // calls Post::all which is one of the function provided by collection
    // return view('posts', [

    //     // we have to run sql query for every post
    //     // 'posts' => Post::all()

    //     // we just have to run sql query once to get all the posts
    //     'posts' => $posts->get(),
    //     'catagories' => Catagory::all()
    // ]);
    // }

    [PostController::class,'index']
)->name('home');  // naming the route 'home'

Route::get('posts/{post:slug}', [PostController::class,'show']
    
//     function (Post $post) {

//     // find a post by its slug and pass it to a view called "post"
//     // $post = Post::find($slug);

//     return view('post', [
//         'post' => $post
//     ]);
// }
);
// ->where('post', '[A-z_/-]+'); 
//constraints


// Route::get('catagories/{catagory:slug}', function (Catagory $catagory) {

//     // find a post by its slug and pass it to a view called "post"
//     // $post = Post::find($slug);

//     return view('posts', [
//         'posts' => $catagory->posts->load(['catagory', 'author']),
//         'currentCatagory' => $catagory,
//         'catagories' => Catagory::all()
//     ]);
// })->name('catagory');  // naming the route catagory


// Route::get('authors/{author:userName}', function (User $author) {

//     return view('post.index', [
//         'posts' => $author->posts->load(['catagory', 'author']),
//         'catagories' => Catagory::all()
//     ]);
// });


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('login', [SessionController::class, 'store'])->middleware('guest');