<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::latest('CodI')->with('autores', 'assuntos')->get();
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::orderBy('Nome')->get();
        $assuntos = Assunto::orderBy('Descricao')->get();
        return view('livros.create', compact('autores', 'assuntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Titulo' => 'required|string|max:40',
            'Editora' => 'required|string|max:40',
            'Edicao' => 'required|integer',
            'AnoPublicacao' => 'required|string|size:4',
            'Preco' => 'required|numeric|between:0,9999.99',
            'autores' => 'required|array',
            'assuntos' => 'required|array',
        ], [
            'Titulo.required' => 'O campo Titulo é obrigatório.',
            'Titulo.max' => 'O campo Titulo não pode ultrapassar 40 caracteres.',
            'Editora.required' => 'O campo Editora é obrigatório.',
            'Editora.max' => 'O campo não pode ultrapassar 40 caracteres.',
            'Edicao.required' => 'O campo Edição é obrigatório.',
            'Edicao.integer' => 'O campo Edição deve ser um número inteiro.',
            'AnoPublicacao.required' => 'O campo Ano de Publicação é obrigatório.',
            'AnoPublicacao.size' => 'O campo precisa conter 4 caracteres.',
            'Preco.required' => 'O campo Preço é obrigatório.',
            'Preco.numeric' => 'O campo Preço deve ser um valor numérico.',
            'Preco.between' => 'O campo Preço deve estar entre :min e :max.',
            'autores.required' => 'Selecione pelo menos um autor.',
            'assuntos.required' => 'Selecione pelo menos um assunto.',
        ]);
        DB::beginTransaction();

        try {

            $livro = Livro::create($request->only(['Titulo', 'Editora', 'Edicao', 'AnoPublicacao', 'Preco']));

            $livro->autores()->attach($request->input('autores'));
            $livro->assuntos()->attach($request->input('assuntos'));

            DB::commit();

            return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->withErrors(['error' => 'Erro ao cadastrar o livro. Por favor, tente novamente mais tarde.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        // Carrega todos os autores e assuntos
        $autores = Autor::orderBy('Nome')->get();
        $assuntos = Assunto::orderBy('Descricao')->get();

        // Carrega os autores e assuntos relacionados ao livro selecionado
        $autoresSelecionados = $livro->autores()->pluck('CodAu')->toArray();
        $assuntosSelecionados = $livro->assuntos()->pluck('CodAs')->toArray();

        return view('livros.edit', compact('livro', 'autores', 'assuntos', 'autoresSelecionados', 'assuntosSelecionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'Titulo' => 'required|string|max:40',
            'Editora' => 'required|string|max:40',
            'Edicao' => 'required|integer',
            'AnoPublicacao' => 'required|string|size:4',
            'Preco' => 'required|numeric|between:0,9999.99',
            'autores' => 'required|array',
            'assuntos' => 'required|array',
        ], [
            'Editora.required' => 'O campo Editora é obrigatório.',
            'Editora.max' => 'O campo não pode ultrapassar 40 caracteres.',
            'Edicao.required' => 'O campo Edição é obrigatório.',
            'Edicao.integer' => 'O campo Edição deve ser um número inteiro.',
            'AnoPublicacao.required' => 'O campo Ano de Publicação é obrigatório.',
            'AnoPublicacao.size' => 'O campo precisa conter 4 caracteres.',
            'Titulo.required' => 'O campo Titulo é obrigatório.',
            'Titulo.max' => 'O campo Titulo não pode ultrapassar 40 caracteres.',
            'Preco.required' => 'O campo Preço é obrigatório.',
            'Preco.numeric' => 'O campo Preço deve ser um valor numérico.',
            'Preco.between' => 'O campo Preço deve estar entre :min e :max.',
            'autores.required' => 'Selecione pelo menos um autor.',
            'assuntos.required' => 'Selecione pelo menos um assunto.',
        ]);

        DB::beginTransaction();

        try {
            $livro->update($request->all());

            $livro->autores()->sync($request->input('autores'));
            $livro->assuntos()->sync($request->input('assuntos'));

            DB::commit();

            return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->withErrors(['error' => 'Erro ao atualizar o livro. Por favor, tente novamente mais tarde.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
