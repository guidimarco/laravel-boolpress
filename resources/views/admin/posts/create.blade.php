@extends('layouts.dashboard')

@section('title', 'Boolpress | This post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Crea nuovo post</h2>
                <form method="POST" action="{{ route('admin.posts.store') }}">
                    {{-- token --}}
                    @csrf

                    {{-- titolo --}}
                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo">
                    </div>

                    {{-- contenuto --}}
                    <div class="form-group">
                        <label>Contenuto</label>
                        <textarea class="form-control" name="text" placeholder="Inserisci l'articolo" row="10" style="height: 200px;"></textarea>
                    </div>

                    {{-- sumbit --}}
                    <button type="submit" class="btn btn-primary">Crea nuovo post</button>
                </form>
            </div>
        </div>
    </div>
@endsection