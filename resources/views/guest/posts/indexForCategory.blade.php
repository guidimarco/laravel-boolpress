@extends('layouts.app')

@section('title', 'Boolpress | Lastest posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tutti i post</h1>
                <h2>Categoria: {{ $this_category -> name }}</h2>
            </div>
        </div>

        <div class="row">
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <a href="{{ route('posts.show', ['category' => $post -> category ? $post -> category -> slug : 'nessuna-categoria', 'post' => $post -> slug]) }}">{{ $post -> title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
