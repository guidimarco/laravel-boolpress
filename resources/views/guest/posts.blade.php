@extends('layouts.app')

@section('title', 'Boolpress | Lastest posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>I miei ultimi posts</h1>
            </div>
        </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 post-container">
                    <h2>{{ $post -> title }}</h2>
                    <p>{{ $post -> text }}</p>
                    <span>Categoria: {{ $post -> category ? $post -> category -> name : '-' }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
