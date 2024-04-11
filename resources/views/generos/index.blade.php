@extends('layouts.app')
@section('title', 'Home Gênero')
@section('content')
    <h1>Listagem de Gêneros</h1>

    <ul>
        @foreach($generos as $genero)
            <li>{{ $genero->nome }}</li>
        @endforeach
    </ul>

    <a href="{{ route('generos.create') }}">Adicionar Gênero</a>
@endsection