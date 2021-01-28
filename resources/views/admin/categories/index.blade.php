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
                    <div class="form-group not-null">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci il titolo">
                    </div>

                    {{-- sumbit --}}
                    <a href="#" class="btn btn-primary my-2" id="create-new-item">
                        Crea nuova categoria
                    </a>
                    <button type="submit" class="d-none"></button>
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
                                    <a href="{{ route('admin.categories.edit', ['category' => $category -> id ]) }}" class="btn btn-outline-dark">
                                        Modifica
                                    </a>
                                    <a href="#" id="link-delete-{{ $category -> id }}" class="btn btn-outline-danger">
                                        Elimina
                                    </a>

                                    <form class="d-none" id="form-delete-{{ $category -> id }}" action="{{ route('admin.categories.destroy', ['category' => $category -> id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" name="button" class="btn btn-outline-danger">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
