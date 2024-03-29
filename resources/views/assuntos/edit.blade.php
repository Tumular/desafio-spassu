@extends('layouts.app')

@section('title', 'Assunto - Edição')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-2">
            <span class="m-0 titulo-pagina">Editar Assunto</span>
        </div>
        <hr>
        <form action="{{ route('assuntos.update', $assunto->CodAs) }}" method="POST" class="d-flex align-items-end mt-3">
            @csrf
            @method('PUT')
            <div class="form-group flex-grow-1 mr-3 mb-0">
                <label for="Descricao">Assunto:</label>
                <input type="text" name="Descricao" id="Descricao" class="form-control" value="{{ $assunto->Descricao }}" minlength="1" maxlength="20" required>
                @error('Descricao')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-acao btn-salvar">Salvar</button>
                <a href="{{ route('assuntos.index') }}" class="btn btn-cancela">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
