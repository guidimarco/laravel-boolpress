@extends('layouts.dashboard')

@section('title', 'Boolpress | This post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Crea nuovo post</h2>
                <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                    {{-- token --}}
                    @csrf

                    {{-- Errori validazione --}}
                    @if ($errors -> any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors -> all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- titolo --}}
                    <div class="form-group">
                        <label>Titolo</label>
                        @error ('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo" value="{{ old('title') }}">
                    </div>

                    {{-- contenuto --}}
                    <div class="form-group">
                        <label>Contenuto</label>
                        @error ('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea class="form-control" name="text" placeholder="Inserisci l'articolo" row="10" style="height: 200px;">{{ old('text') }}</textarea>
                    </div>

                    {{-- img --}}
                    <div class="form-group">
                        <label>Immagine</label>
                        @error ('cover-img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" class="form-control" name="cover-img">
                    </div>

                    {{-- category --}}
                    <div class="form-group">
                        <label>Categoria</label>
                        @error ('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <select class="custom-select" name="category_id">
                            <option value="">Seleziona una categoria</option>
                            {{-- <option value="pippo">L'orrore</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category -> id }}"
                                {{ old('category_id') == $category -> id ? 'selected' : ''}}>
                                    {{ $category -> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- tags --}}
                    <span>Tags:</span>
                    @error ('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <div class="form-check">
                        <input name="tags[]" class="form-check-input" type="checkbox" value="pippo">
                        <label class="form-check-label">
                            L'orrore
                        </label>
                    </div> --}}
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag -> id }}"
                            {{ in_array($tag -> id, old('tags', [])) ? 'checked' : ''}}>
                            <label class="form-check-label">
                                {{ $tag -> name }}
                            </label>
                        </div>
                    @endforeach

                    {{-- sumbit --}}
                    <button type="submit" class="btn btn-primary my-2">Crea nuovo post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
