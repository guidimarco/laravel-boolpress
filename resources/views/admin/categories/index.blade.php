@extends('layouts.dashboard')

@section('title', 'Boolpress | All categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Post's categories</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Crea una nuova categoria</h2>

                <form method="POST" action="{{ route('admin.categories.store') }}">
                    {{-- token --}}
                    @csrf

                    {{-- titolo --}}
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci il titolo">
                    </div>

                    {{-- sumbit --}}
                    <button type="submit" class="btn btn-primary my-2">Crea nuova categoria</button>
                </form>
            </div>
        </div>

        {{-- table: all cat --}}
        <div class="row">
            <div class="col-12">
                <h2>Tutti le categorie</h2>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Creata</th>
                            <th scope="col">Edita</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category -> id }}</th>
                                <td>{{ $category -> name }}</td>
                                <td>{{ $category -> slug }}</td>
                                <td>{{ $category -> created_at }}</td>
                                <td class="w-25">
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
