@extends('layouts.app')

@section('title', 'Boolpress | Lastest posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>I miei posts</h1>
            </div>
        </div>

        <div class="row">
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <a href="{{ route('posts.show', ['post' => $post -> slug]) }}">{{ $post -> title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
