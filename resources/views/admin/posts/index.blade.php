@extends('layouts.dashboard')

@section('title', 'Boolpress | All posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>All posts</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.posts.create')}}" class="btn btn-primary my-2">
                    Crea nuovo post
                </a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                                    <a href="{{ route('admin.posts.show', ['post' => $post -> id]) }}" class="btn btn-outline-info">
                                        Vedi
                                    </a>
                                    <a href="{{ route('admin.posts.edit', ['post' => $post -> id]) }}" class="btn btn-outline-dark">
                                        Modifica
                                    </a>
                                    <a href="#" id="link-delete-{{ $post -> id }}" class="btn btn-outline-danger">
                                        Elimina
                                    </a>

                                    <form class="d-none" id="form-delete-{{ $post -> id }}" action="{{ route('admin.posts.destroy', ['post' => $post -> id]) }}" method="POST">
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
