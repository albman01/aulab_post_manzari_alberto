
<x-layout>
    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class='display-4'>Benvenuto</h1>
                <div class="my-3">
                    
                    @if($articles->count())
                        @foreach($articles as $article)
                            <h2>{{ $article->title }}</h2>
                            <p>{{ $article->excerpt }}</p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
                            <hr>
                        @endforeach
                    @else
                        <p>Nessun articolo disponibile.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
