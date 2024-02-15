<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assunto;
use App\Models\LivroAssunto;

class AssuntoController extends Controller
{
    public function index()
    {
        $assuntos = Assunto::latest('CodAs')->get();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Descricao' => 'required|string|max:20',
        ], [
            'Descricao.required' => 'O campo Descrição é obrigatório.',
            'Descricao.max' => 'O campo Descrição não pode ultrapassar 20 caracteres',
        ]);

        Assunto::create($request->all());

        return redirect()->route('assuntos.index')->with('success', 'Assunto criado com sucesso!');
    }

    public function edit($id)
    {
        $assunto = Assunto::find($id);
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Descricao' => 'required|string|max:20',
        ], [
            'Descricao.required' => 'O campo Descrição é obrigatório.',
            'Descricao.max' => 'O campo Descrição não pode ultrapassar 20 caracteres',
        ]);

        $assunto = Assunto::find($id);
        $assunto->update($request->all());

        return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $livrosRelacionados = LivroAssunto::where('Assunto_CodAs', $id)->exists();

        if ($livrosRelacionados) {
            return redirect()->route('assuntos.index')->with('error', 'Este assunto não pode ser excluído pois está relacionado a um ou mais livros.');
        }

        $assunto = Assunto::find($id);
        $assunto->delete();

        return redirect()->route('assuntos.index')->with('success', 'Assunto excluído com sucesso!');
    }
}
