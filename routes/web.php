<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LivroController::class, 'index'])->name('index');
Route::get('/livros/create', [LivroController::class, 'create']);
Route::get('/livros/{id}', [LivroController::class, 'show'] );
Route::delete('/livros/{id}', [LivroController::class, 'destroy'] );
Route::post('/livros', [LivroController::class, 'store'] );
Route::post('/livros/update/{id}', [LivroController::class, 'update'] );
Route::post('/livros/edit/{id}', [LivroController::class, 'edit'] );

Route::post('/livros/{livro}/reservar', [LivroController::class, 'reservar'])->name('livros.reservar');
Route::post('/livros/{livro}/alugar', [LivroController::class, 'alugar'])->name('livros.alugar');
Route::post('/livros/{livro}/devolver', [LivroController::class, 'devolver'])->name('livros.devolver');

Route::resource('generos', GeneroController::class);

Route::get('/login/login', function(){
    return view('login.login'); 
});
