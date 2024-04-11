@extends('layouts.app')

@section('content')
    <h1>Adicionar Gênero</h1>

    <form action="{{ route('generos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome do Gênero:</label>
        <input type="text" id="nome" name="nome">
        <button type="submit">Adicionar Gênero</button>
    </form>
@endsection