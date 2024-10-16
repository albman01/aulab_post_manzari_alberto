<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:5')]
    public $subtitle;

    #[Validate('required|min:10')]
    public $description;
    
    #[Validate('required')]
    public $category;
    public $article;

    public function store ()
    {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);
        
        return redirect(route('homepage'))->with('message', 'Articolo pubblicato');
        
    }

    // public function save()
    // {
    //     $this->validate();

    //     // Salvataggio dell'immagine
    //     $path = $this->image ? $this->image->store('images') : null;

    //     // Creazione dell'articolo
    //     Article::create([
    //         'title' => $this->title,
    //         'subtitle' => $this->subtitle,
    //         'content' => $this->content,
    //         'image' => $path,
            
    //     ]);

    //     // Reset dei campi
    //     $this->reset();

    //     // Feedback utente
    //     session()->flash('message', 'Articolo creato con successo!');
    // }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.create-article-form', compact('categories'));
    }
}
