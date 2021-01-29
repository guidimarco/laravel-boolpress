@extends('layouts.app')

@section('title', 'Boolpress | Lastest posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post -> title }}</h1>
                <p>{{ $post -> text }}</p>

                {{-- category --}}
                <span>
                    Categoria:
                    @if ($post -> category)
                        <a href="{{ route('posts.indexForCategory', ['category' => $post -> category -> slug]) }}">
                            {{ $post -> category -> name }}
                        </a>
                    @else
                        -
                    @endif
                </span><br/>

                {{-- tags --}}
                <span>
                    Tag:
                    @forelse ($post -> tags as $tag)
                        <a href="{{ route('posts.indexForTag', ['tag' => 'tag']) }}">{{
                            $tag -> name
                        }}</a>{{
                            $loop -> last ? '' : ','
                        }}
                    @empty
                        -
                    @endforelse
                </span><br/>
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
