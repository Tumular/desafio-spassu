@extends('layouts.app')

@section('title', 'Assunto - Cadastro')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-2">
            <span class="m-0 titulo-pagina">Novo Assunto</span>
        </div>
        <hr>
        <form action="{{ route('assuntos.store') }}" method="POST" class="d-flex align-items-end mt-3">
            @csrf
            <div class="form-group flex-grow-1 mb-0">
                <label for="Descricao">Assunto:</label>
                <input type="text" name="Descricao" id="Descricao" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
                <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
