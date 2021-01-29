@extends('layouts.dashboard')

@section('title', 'Boolpress | This post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Modifica il post</h2>
                <form method="POST" action="{{ route('admin.posts.update', ['post' => $post -> id]) }}">
                    {{-- token --}}
                    @csrf
                    @method('PUT')

                    {{-- titolo --}}
                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo"
                        value="{{ $post -> title }}">
                    </div>

                    {{-- contenuto --}}
                    <div class="form-group">
                        <label>Contenuto</label>
                        <textarea class="form-control" name="text" placeholder="Inserisci l'articolo" row="10" style="height: 200px;">{{
                            $post -> text
                        }}</textarea>
                    </div>

                    {{-- category --}}
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="custom-select" name="category_id">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category -> id }}"
                                    {{ $post -> category_id == $category -> id ? 'selected' : ''}}>{{ $category -> name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- tag --}}
                    <span>Tags:</span>
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag -> id }}"
                            {{ $post -> tags -> contains($tag) ? 'checked' : ''}}>
                            <label class="form-check-label">
                                {{ $tag -> name }}
                            </label>
                        </div>
                    @endforeach

                    {{-- sumbit --}}
                    <button type="submit" class="btn btn-primary my-2">Conferma le modifiche</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-info">
                        Torna a tutti i post
                    </a>
                    <a href="#" id="link-delete" class="btn btn-outline-danger">
                        Elimina
                    </a>
                </form>

                {{-- hidden form --}}
                <form class="d-none" id="form-delete" action="{{ route('admin.posts.destroy', ['post' => $post -> id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" name="button" class="btn btn-outline-danger"></button>
                </form>
            </div>
        </div>
    </div>
@endsection
