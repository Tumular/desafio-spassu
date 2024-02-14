@extends('layouts.app')

@section('title', 'Autores - Edição')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-2">
            <span class="m-0 titulo-pagina">Editar Autor</span>
        </div>
        <hr>
        <form action="{{ route('autores.update', $autor->CodAu) }}" method="POST" class="d-flex align-items-end mt-3">
            @csrf
            @method('PUT')
            <div class="form-group flex-grow-1 mr-3 mb-0">
                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" id="Nome" class="form-control" value="{{ $autor->Nome }}" minlength="1" maxlength="40" required>
                @error('Nome')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-acao btn-salvar">Salvar</button>
                <a href="{{ route('autores.index') }}" class="btn btn-cancela">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
