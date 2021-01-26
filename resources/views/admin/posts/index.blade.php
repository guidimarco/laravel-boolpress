@extends('layouts.dashboard')

@section('title', 'Boolpress | All posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>All posts</h1>
            </div>
        </div>

        {{-- table: all posts --}}
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Testo</th>
                            <th scope="col">Edita</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post -> id }}</th>
                                <td>{{ $post -> title }}</td>
                                <td>{{ $post -> text }}</td>
                                <td class="w-25">
                                    <a href="#" class="btn btn-outline-info">
                                        Vedi
                                    </a>
                                    <a href="#" class="btn btn-outline-warning">
                                        Modifica
                                    </a>
                                    <a href="#" class="btn btn-outline-danger">
                                        Elimina
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
