<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController as PostAPIController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;

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

Route::get('', [HomeController::class, 'home'])->name('home');

Route::get('dashboard', [HomeController::class, 'dashboard'])->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::resource('posts', PostController::class)->only([
    'index', 'show', 'create', 'store'
]);

Route::get('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('posts/{post}/comments/store', [PostCommentController::class, 'store'])->name('posts.comments.store');

// API:
Route::group(['prefix' => 'api'], function () {
        
    // Open API:

    Route::resource('posts', PostAPIController::class)->only([
        'index'
    ]);

});
