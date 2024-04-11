@extends('layouts.main')
@section('title', 'Cadastro de Livro')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre seu livro</h1>
    <form action="/livros" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do livro</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="titulo">Livro:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do livro...">
        </div>
        <div class="form-group">
            <label for="ano_lancamento">Data do lançamento:</label>
            <input type="date" class="form-control" id="ano_lancamento" name="ano_lancamento">
        </div>
        <div class="form-group">
            <label for="editora">Editora:</label>
            <input type="text" class="form-control" id="editora" name="editora" placeholder="Editora...">
        </div>
        <div class="form-group">
            <label for="genero_id">Gênero</label>
            <select name="genero_id" id="genero_id">
            @foreach($generos as $id=>$genero)
                <option value="{{ $id }}">{{ $genero }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado">
                <option value="RESERVADO">RESERVADO</option>
                <option value="ALUGADO">ALUGADO</option>
                <option value="DISPONIVEL">DISPONÍVEL</option>
            </select>
        </div>
        <!-- Botões -->
        <button type="submit" class="btn btn-primary">Cadastrar livro</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection