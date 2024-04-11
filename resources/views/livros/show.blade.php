@extends('layouts.main')
@section('title', 'Detalhes de Livros')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um livro</h1>
    <form action="/" method="GET">
        <input type="text" id="search" class="form-control" placeholder="procurar ...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Lista de livros</h2>
    <p class="subtitle">Livros cadastrados</p>
    <div id="cards-container" class="row">
    @foreach($livros as $livro)    
    <div class="card col-md-3">
        <img src="/img/livros/livro.jpg" alt="{{ $livro->titulo }}">
        <div class="card-body" >
            <p class="card-date">{{ date('d/m/Y', strtotime($livro->ano_lancamento)) }}</p>
            <h5 class="card-title">{{ $livro->titulo }}</h5>                
            <!-- Botões -->
            <div style="display: flex; gap:0.1rem">

                <form action="{{ route('livros.reservar', $livro->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Reservar</button>
                </form>
                <form action="{{ route('livros.alugar', $livro->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Alugar</button>
                </form>
                <form action="{{ route('livros.devolver', $livro->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Devolver</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
        @if(count($livros) == 0)
            <p>Não há Livros cadastrados no momento.</p>
        @endif
    </div>
</div>
    
@endsection

