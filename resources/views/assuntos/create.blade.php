@extends('layouts.app')

@section('title', 'Assunto - Cadastro')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="m-0">Novo Assunto</h3>
        </div>

        <form action="{{ route('assuntos.store') }}" method="POST" class="d-flex align-items-end mt-3">
            @csrf
            <div class="form-group flex-grow-1 mr-3 mb-0">
                <label for="Descricao">Assunto:</label>
                <input type="text" name="Descricao" id="Descricao" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection