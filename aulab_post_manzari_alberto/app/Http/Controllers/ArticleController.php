<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array

    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory']),
        ];
        
    }


    public function create()
    {
        return view('articles.create');
    }
    
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function byCategory(Category $category){
        $articles = $category->articles()->orderBy('created_at', 'desc')->get();

        return view('article.by-category', compact('category', 'articles'));
        }
    

}