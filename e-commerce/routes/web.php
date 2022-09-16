<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [Controller::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{slug}', [ProductController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index']);
});

Route::post('/logout', [LoginController::class, 'destroy']);
Route::post('/login', [LoginController::class, 'store']);

Route::post('/cart/{id}', [AddToCartController::class, 'store']);
Route::get('/cart', [AddToCartController::class, 'index']);
Route::get('/delete-cart/{id}', [AddToCartController::class, 'destory']);
Route::get('/delete-all-session', [AddToCartController::class, 'delete']);

Route::get('/delivery-form', [OrderController::class, 'index']);
Route::post('/delivery-form/submit-order', [OrderController::class, 'store']);

