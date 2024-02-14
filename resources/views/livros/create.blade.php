@extends('layouts.app')

@section('title', 'Cadastrar Livro')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="m-0 titulo-pagina">Novo Livro</span>
        </div>
        <hr>
        <form action="{{ route('livros.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Titulo">Título:</label>
                        <input type="text" name="Titulo" id="Titulo" class="form-control" value="{{ old('Titulo') }}" minlength="1" maxlength="40" required>
                        @error('Titulo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Editora">Editora:</label>
                        <input type="text" name="Editora" id="Editora" class="form-control" value="{{ old('Editora') }}" minlength="1" maxlength="40" required>
                        @error('Editora')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Edicao">Edição:</label>
                        <input type="number" name="Edicao" id="Edicao" class="form-control" value="{{ old('Edicao') }}" min="0" required>
                        @error('Edicao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="AnoPublicacao">Publicação:</label>
                        <input type="text" name="AnoPublicacao" id="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao') }}" maxlength="4" required>
                        @error('AnoPublicacao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Preco">Preço:</label>
                        <input type="text" name="Preco" id="Preco" class="form-control" value="{{ old('Preco') }}" required>
                        @error('Preco')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="autores">Autores:</label>
                        <select name="autores[]" id="autores" class="form-control" multiple required>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->CodAu }}"
                                    {{ collect(old('autores'))->contains($autor->CodAu) ? 'selected' : '' }}>
                                    {{ $autor->Nome }}</option>
                            @endforeach
                        </select>
                        @error('autores')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="assuntos">Assuntos:</label>
                        <select name="assuntos[]" id="assuntos" class="form-control" multiple required>
                            @foreach ($assuntos as $assunto)
                                <option value="{{ $assunto->CodAs }}"
                                    {{ collect(old('assuntos'))->contains($assunto->CodAs) ? 'selected' : '' }}>
                                    {{ $assunto->Descricao }}</option>
                            @endforeach
                        </select>
                        @error('assuntos')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-acao">Salvar</button>
                <a href="{{ route('livros.index') }}" class="btn btn-cancela">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
