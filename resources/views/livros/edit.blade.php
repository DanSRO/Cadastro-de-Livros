@extends('layouts.main')
@section('title', 'Cadastro de Livro')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre seu livro</h1>
    <form action="/livros/update/{{$livro->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do livro</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="title">Livro:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do livro...">
        </div>
        <div class="form-group">
            <label for="date">Data do lançamento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="city">Editora:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Editora...">
        </div>
        <div class="form-group">
            <label for="genero_id">Gênero</label>
            <select name="genero_id" id="genero_id" class="form-control">
                @foreach($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <textarea name="estado" class="form-control" id="estado" placeholder="Qual estado do livro? "></textarea>
        </div>
        <!-- Botões -->
        <button type="submit" class="btn btn-primary">Editar livro</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection