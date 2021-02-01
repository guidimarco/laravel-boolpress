@extends('layouts.dashboard')

@section('title', 'Boolpress | Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
                <p>Ciao {{ $this_user -> name }}!</p>
                <p>I tuoi dati:</p>
                <ul>
                    <li>Nome: {{ Auth::user() -> name }}</li>
                    <li>Mail: {{ Auth::user() -> email }}</li>
                    <li>Token:
                        @if (Auth::user() -> api_token)
                            {{ Auth::user() -> api_token }}
                        @else
                            <form class="d-inline-block" action="{{ route('admin.get_token') }}" method="POST">
                                @csrf

                                <button type="submit" name="button" class="btn btn-primary">Genera il tuo token</button>
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
