@extends('layouts.dashboard')

@section('title', 'Boolpress | This post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $post -> title }}</h2>
                <ul>
                    <li>ID: {{ $post -> id }}</li>
                    <li>Ref: {{ $post -> slug }}</li>
                    <li>Contenuto: {{ $post -> text }}</li>
                    <li>Creato: {{ $post -> created_at -> format('d/m/Y H:i') }}</li>
                    <li>Ultima modifica: {{ $post -> updated_at -> format('d/m/Y H:i') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
