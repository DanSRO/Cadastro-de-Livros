<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', ['generos' => $generos]);
    }

    public function create()
    {
        $generos=Genero::all();
        return view('livros.create', compact('generos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:generos|max:255',
        ]);

        Genero::create($request->all());

        return redirect()->route('generos.index')
                         ->with('success', 'Gênero criado com sucesso.');
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, Genero $genero)
    {
        $request->validate([
            'nome' => 'required|unique:generos,nome,' . $genero->id . '|max:255',
        ]);

        $genero->update($request->all());

        return redirect()->route('generos.index')
                         ->with('success', 'Gênero atualizado com sucesso.');
    }

    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect()->route('generos.index')
                         ->with('success', 'Gênero excluído com sucesso.');
    }
}
