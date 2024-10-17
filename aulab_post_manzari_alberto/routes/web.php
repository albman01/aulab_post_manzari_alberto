<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;


Route::get('/' , [PublicController::class, 'homepage'])->name('homepage');

// Rotta per visualizzare il form di creazione
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/category{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');

Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class,])->name('admin.dashboard');
});