<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Redirect;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();
        return view('/welcome', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $generos=Genero::pluck('nome', 'id')->toArray();            
        $generos = ['DESENVOLVIMENTO', 'PROGRAMAÇÃO', 'ROMANCE', 'TERROR'];
        return view('livros.create', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $livro = new Livro;

        $livro->titulo = $request->titulo;
        $livro->editora = $request->editora;
        $livro->genero_id = $request->genero_id;
        $livro->ano_lancamento = $request->ano_lancamento;
        $livro->estado = $request->estado;        
        
        $livro->save();
        return redirect('/')->with('msg','Evento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $livros = Livro::all();
            // dd($livros);
            return view('livros.show', compact('livros'));
        }catch(Exception $e){
            return redirect('/')->with('msg', 'Livro não encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livro = Livro::findOrFail($id);      

        return view('livros.edit', ['livro' => $livro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livro = $request->all();
        Livro::findOrFail($request->id)->update($livro);
        return redirect('/')->with('msg', 'Livro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livros = Livro::findOrFail($id);
        $livros->delete();
        return redirect('/')->with('msg', 'Livro excluído com sucesso.');
    }

    // para as ações alugar, devolver e reservar

    public function reservar(Livro $livro)
    {
        $livro ->estado = 'RESERVADO';
        $livro->save();
        return redirect()->back()->with('msg', 'Livro reservado com sucesso');
    }

    public function alugar(Livro $livro)
    {
        $livro->estado = 'ALUGADO';
        $livro->save();
        return redirect()->back()->with('msg', 'Livro alugado com sucesso');
    }

    public function devolver(Livro $livro)
    {
        $livro->estado = 'DEVOLVIDO';
        $livro->save();    
        return redirect()->back()->with('msg', 'Livro devolvido com sucesso');
    }
}
