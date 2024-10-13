<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/' , [PublicController::class, 'homepage'])->name('homepage');

// Rotta per visualizzare il form di creazione
Route::get('/articles/create', [ArticleController::class, 'create'])->name('create.article');

Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');


Route::get('/article/category{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
