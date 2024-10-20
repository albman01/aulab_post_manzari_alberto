<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()

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
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function byCategory(Category $category){
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('articles.by-category', compact('category', 'articles'));
        }

        // public function byUser(User $user){
        //     $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', desc)->get();
        //     return view('article.by-user', compact('user', 'articles'));
            
        // }
        public function store(Request $request)
{
    
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'subtitle' => 'required|max:255',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Se gestisci un'immagine
        'category' => 'required'
        
    ]);

   
    $path = $request->file('image') ? $request->file('image')->store('images') : null;

    
    $article = Article::create([
        'title' => $request->title,
        'subtitle' =>$request->subtitle,
        'description'=>$request->description,
        'image'=> $request->file('image')->store('public/images'),
        'user_id' => Auth::user()->id,
    ]);
    // Reindirizza alla pagina degli articoli
    return redirect()->route('articles.index')->with('success', 'Articolo creato con successo!');
}

        

}