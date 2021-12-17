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

Route::get('/', function () {
    return view('welcome');
});

Route::post('comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.store');

Route::get('/blog/cat/{category}', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/blog/{post}', [\App\Http\Controllers\PostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\PostController::class, 'create']);
Route::post('/blog/create/post', [\App\Http\Controllers\PostController::class, 'store']);
Route::get('/blog/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']);
Route::put('/blog/{post}/edit', [\App\Http\Controllers\PostController::class, 'update']);
Route::delete('/blog/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show']);
Route::get('/categories/create/category', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/categories/create/category', [\App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit']);
Route::put('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'update']);
Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
