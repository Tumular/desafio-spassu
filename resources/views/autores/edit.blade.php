@extends('layouts.app')

@section('title', 'Autores - Edição')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="m-0">Editar Autor</h3>
        </div>

        <form action="{{ route('autores.update', $autor->CodAu) }}" method="POST" class="d-flex align-items-end mt-3">
            @csrf
            @method('PUT')
            <div class="form-group flex-grow-1 mr-3 mb-0">
                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" id="Nome" class="form-control" value="{{ $autor->Nome }}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
