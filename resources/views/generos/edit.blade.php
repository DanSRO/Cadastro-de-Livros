@extends('layouts.app')
@section('title', 'Edição Gênero')
@section('content')
    <h1>Editar Gênero</h1>

    <form action="{{ route('generos.update', $genero->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome do Gênero:</label>
        <input type="text" id="nome" name="nome" value="{{ $genero->nome }}">
        <button type="submit">Salvar Alterações</button>
    </form>
@endsection