<x-layout>
    <div class="container-fluid text-center bg-body-tertiary">
    <div class="row vh-100 justify-content-center align-items-center">
    <div class="col-12">
        <h1 class='dispaly-4'>Benvenuto </h1>
        <div class="my-3">
            @auth
            <a class="btn btn-dark" href="{{ route('create.article') }}">Pubblica un articolo</a>
            @endauth
            
           
            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
            <p class="small text-muted">Categoria:
                <a href="{{route('articles.byCategory', $article->category)}}" class="text-capitalize fw-bold text-muted">{{ $article->category->name }}</a>
            </p>
            </div>
    </div>
    </div>
    </div>
</x-layout>