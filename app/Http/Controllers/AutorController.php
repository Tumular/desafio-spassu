<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\LivroAutor;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::latest('CodAu')->get();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string|max:40',
        ], [
            'Nome.required' => 'O campo Nome é obrigatório.',
            'Nome.max' => 'O campo Nome não pode ultrapassar 40 caracteres',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor criado com sucesso!');
    }

    public function edit($id)
    {
        $autor = Autor::find($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nome' => 'required|string|max:40',
        ], [
            'Nome.required' => 'O campo Nome é obrigatório.',
            'Nome.max' => 'O campo Nome não pode ultrapassar 40 caracteres',
        ]);

        $autor = Autor::find($id);
        $autor->update($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $livrosRelacionados = LivroAutor::where('Autor_CodAu', $id)->exists();

        if ($livrosRelacionados) {
            return redirect()->route('autores.index')->with('error', 'Este Autor não pode ser excluído pois está relacionado a um ou mais livros.');
        }

        $autor = Autor::find($id);
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso!');
    }
}
