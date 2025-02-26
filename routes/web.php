<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/new', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/new', [ArticleController::class, 'store'])->name('articles.store');