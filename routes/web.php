<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/home', [ArticleController::class, 'index']);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add',[ArticleController::class, 'create']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
Route::get('/article/delete/{id}', [ArticleController::class, 'delete']);
Route::get('/article/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/article/edit/{id}', [ArticleController::class, 'update']);

Route::post('/comment/add', [CommentController::class, 'add']);
Route::get('/comment/delete/{id}', [CommentController::class, 'delete']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
