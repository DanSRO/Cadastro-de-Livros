@extends('layouts.main')
@section('title', 'Livros')
@section('content')

<div class="col-md-10 offset-md-1">
        <div class="row">
            @foreach($livros as $livro)    
            <div id="image-container" class="col-md-6">
                <img src="/img/livros/livro.jpg" class="img-fluid" alt="{{ $livro->titulo}}">            
            </div>    
            <div id="info-container" class="col-md-6">        
                <h1>{{ $livro->titulo }}</h1>
                <p class="event-city"><ion-icon name="star-outline"></ion-icon>{{ $livro->editora }}</p>            
                <p class="event-city"><ion-icon name="star-outline"></ion-icon>{{ $livro->ano_lancamento }}</p>            
                <p class="event-city"><ion-icon name="star-outline"></ion-icon>{{ $livro->estado }}</p>            
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon></p>
                <div class="col-md-12" id="description-container">
                    <h3>Sobre o livro</h3>
                    <p class="event-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sint omnis consectetur maiores eius rerum accusamus corrupti voluptatum porro magnam reiciendis veniam, optio maxime rem iure a aperiam. Accusamus nam nemo quaerat repudiandae veniam fugiat natus, sapiente necessitatibus officiis expedita culpa impedit corporis possimus dolorum harum obcaecati quasi saepe magni.</p>
                </div>
                <a href="/livros/show">Ações sobre o Livro</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection