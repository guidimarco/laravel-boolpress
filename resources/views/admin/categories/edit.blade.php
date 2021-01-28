@extends('layouts.dashboard')

@section('title', 'Boolpress | This post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Modifica la categoria</h2>
                <form method="POST" action="{{ route('admin.categories.update', ['category' => $category -> id]) }}">
                    {{-- token --}}
                    @csrf
                    @method('PUT')

                    {{-- titolo --}}
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci il titolo"
                        value="{{ $category -> name }}">
                    </div>

                    {{-- sumbit --}}
                    <button type="submit" class="btn btn-primary my-2">Conferma le modifiche</button>
                    
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-info">
                        Torna a tutte le categorie
                    </a>
                    <a href="#" id="link-delete" class="btn btn-outline-danger">
                        Elimina
                    </a>
                </form>

                {{-- hidden form --}}
                {{-- <form class="d-none" id="form-delete" action="{{ route('admin.posts.destroy', ['post' => $post -> id]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" name="button" class="btn btn-outline-danger"></button>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
