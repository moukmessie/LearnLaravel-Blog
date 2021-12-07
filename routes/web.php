<?php

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

/*ROUTE GET*/
Route::get('/',[\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/articles',[\App\Http\Controllers\PostController::class, 'articles'])->name('articles');

Route::get('/posts/create',[\App\Http\Controllers\PostController::class,'create'])->name('posts.create');

Route::get('/add_Comment',[\App\Http\Controllers\PostController::class,'add_Comment'])->name('add_Comment');

Route::get('/posts/{id}',[\App\Http\Controllers\PostController::class, 'show_post'])->name('article_post');

Route::get('/video/{id}',[\App\Http\Controllers\PostController::class, 'show_video'])->name('article_video');
Route::get('/contact',[\App\Http\Controllers\PostController::class, 'contact'])->name('contact');


Route::get('/testmail',[\App\Http\Controllers\PostController::class,'testmail']);

/*ROUTE POST*/
Route::post('/posts/create',[\App\Http\Controllers\PostController::class,'store'])->name('posts.store');
