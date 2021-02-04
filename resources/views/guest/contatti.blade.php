@extends('layouts.app')

@section('title', 'Boolpress | My Blog')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contattaci</h1>

                <form method="POST" action="{{ route('contatti.send') }}">
                    {{-- token --}}
                    @csrf

                    {{-- titolo --}}
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci il tuo nome">
                    </div>

                    {{-- mail --}}
                    <div class="form-group">
                        <label>Mail</label>
                        <input type="mail" class="form-control" name="mail" placeholder="Inserisci la tua e-mail">
                    </div>

                    {{-- contenuto --}}
                    <div class="form-group">
                        <label>Messaggio:</label>
                        <textarea class="form-control" name="text" placeholder="Inserisci il messaggio da inviare" row="10" style="height: 200px;"></textarea>
                    </div>

                    {{-- sumbit --}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-control btn-primary" value="Invia">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
