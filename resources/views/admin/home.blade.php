@extends('layouts.dashboard')

@section('title', 'Boolpress | Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
                <p>Ciao {{ $this_user -> name }}!</p>
            </div>
        </div>
    </div>
@endsection
