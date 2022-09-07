<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
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
Route::get('/',[PostController::class, 'index'])->name('home');  // naming the route 'home'

Route::get('posts/{post:slug}',[PostController::class, 'show']);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', [NewsletterController::class]);

Route::get('admin/posts', [AdminPostsController::class, 'index'])->middleware('admin');
Route::post('admin/posts', [AdminPostsController::class, 'store'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostsController::class, 'create'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostsController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostsController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostsController::class, 'destroy'])->middleware('admin');

// Admin Section
// Route::middleware('can:admin')->group(function () {
//     Route::resource('admin/posts', AdminPostsController::class)->except('show');
// });