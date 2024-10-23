
<div>
    @if (session()->has('success'))
        <div class="alert-success text-center">
        {{session('success')}}
        </div>
    @endif
<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit.prevent="store">
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" wire:model.blur="title">
        @error('title')
        <p class="fst-italic text-danger">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="subtitle" class="form-label">Sottotitolo</label>
        <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{old('subtitle')}}" wire:model.blur="subtitle">
        
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="file" name="image" class="form-control" id="image">
        @error('image')
        <span class="text-danger">{{message}}</span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="category" class="form-label">Categoria</label>
        <select name="category" id="category" class="form-control" wire:model.blur='category'>
            <option selected disabled>Seleziona Categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>    
            @endforeach
        </select>
        @error('category')
        <span class="text-danger">{{$message}}</span>
        @enderror
        
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" name="tags" class="form-control" id="tags" value="{{old('tags')}}">
            <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
            @error('tags')
                <span class="text-danger">{{$message}}</span>
                @enderror
        
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea id="description" cols="30" rows="10" class="form-control" wire:model.blur="description"></textarea>
            @error('description')
            <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-3 d-flex justify-content-center flex-column align-items-center">
            <button type="submit" class="btn btn-outline-secondary">Inserisci articolo</button>
            <a href="{{route('homepage')}}" class="text-secondary mt-2">Torna alla home</a>
        </div>
    </div>
    
</form>
</div>

