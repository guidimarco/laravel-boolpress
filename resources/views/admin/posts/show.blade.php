@extends('layouts.dashboard')

@section('title', 'Boolpress | This post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Azioni</h2>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-info">
                    Torna a tutti i post
                </a>
                <a href="{{ route('admin.posts.edit', ['post' => $post -> id]) }}" class="btn btn-outline-dark">
                    Modifica
                </a>
                <a href="#" id="link-delete" class="btn btn-outline-danger">
                    Elimina
                </a>

                {{-- hidden form -> delete --}}
                <form class="d-none" id="form-delete" action="{{ route('admin.posts.destroy', ['post' => $post -> id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" name="button" class="btn btn-outline-danger">Elimina</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Post info</h3>
                <ul>
                    <li>ID: {{ $post -> id }}</li>
                    <li>Titolo: {{ $post -> title }}</li>
                    <li>Contenuto: {{ $post -> text }}</li>
                    <li>Categoria: {{ $post -> category ? $post -> category -> name : '-' }}</li>
                    <li>Creato: {{ $post -> created_at -> format('d/m/Y H:i') }}</li>
                    <li>Ultima modifica: {{ $post -> updated_at -> format('d/m/Y H:i') }}</li>
                    <li>URI: {{ $post -> slug }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
