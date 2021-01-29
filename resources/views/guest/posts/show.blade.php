@extends('layouts.app')

@section('title', 'Boolpress | Lastest posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post -> title }}</h1>
                <p>{{ $post -> text }}</p>
                <span>Categoria: {{ $post -> category ? $post -> category -> name : '-' }}</span><br/>
                <span>Post del: {{ date_format($post -> created_at, 'd/m/Y') }}</span>
            </div>
            <div class="col-12">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">
                    Torna a tutti i post
                </a>
            </div>
        </div>
    </div>
@endsection
