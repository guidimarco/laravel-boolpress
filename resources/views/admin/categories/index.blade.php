@extends('layouts.dashboard')

@section('title', 'Boolpress | All categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>All categories</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-primary my-2">
                    Crea una nuova categoria
                </a>
            </div>
        </div>

        {{-- table: all cat --}}
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Edita</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category -> id }}</th>
                                <td>{{ $category -> name }}</td>
                                <td>{{ $category -> slug }}</td>
                                <td class="w-25">
                                    <a href="#" class="btn btn-outline-info">
                                        Vedi
                                    </a>
                                    <a href="#" class="btn btn-outline-dark">
                                        Modifica
                                    </a>
                                    <a href="#" {{-- id="link-delete-{{ $post -> id }}" --}} class="btn btn-outline-danger">
                                        Elimina
                                    </a>

                                    {{-- <form class="d-none" id="form-delete-{{ $post -> id }}" action="{{ route('admin.posts.destroy', ['post' => $post -> id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" name="button" class="btn btn-outline-danger">Elimina</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
