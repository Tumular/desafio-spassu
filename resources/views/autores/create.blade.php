@extends('layouts.app')

@section('title', 'Autores - Cadastro')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="m-0 titulo-pagina">Novo Autor</span>
        </div>
        <hr>
        <form action="{{ route('autores.store') }}" method="POST" class="d-flex align-items-end mt-3">
            @csrf
            <div class="form-group flex-grow-1 mr-3 mb-0">
                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" id="Nome" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-acao btn-salvar">Salvar</button>
                <a href="{{ route('autores.index') }}" class="btn btn-cancela">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
