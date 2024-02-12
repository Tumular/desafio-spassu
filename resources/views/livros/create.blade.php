@extends('layouts.app')

@section('title', 'Cadastrar Livro')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="m-0">Novo Livro</h3>
        </div>

        <form action="{{ route('livros.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Nome">Nome:</label>
                        <input type="text" name="Nome" id="Nome" class="form-control" value="{{ old('Nome') }}" required>
                        @error('Nome')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Editora">Editora:</label>
                        <input type="text" name="Editora" id="Editora" class="form-control" value="{{ old('Editora') }}" required>
                        @error('Editora')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Edicao">Edição:</label>
                        <input type="number" name="Edicao" id="Edicao" class="form-control" value="{{ old('Edicao') }}" required>
                        @error('Edicao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="AnoPublicacao">Publicação:</label>
                        <input type="text" name="AnoPublicacao" id="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao') }}" required>
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
                            @foreach($autores as $autor)
                                <option value="{{ $autor->CodAu }}" {{ (collect(old('autores'))->contains($autor->CodAu)) ? 'selected':'' }}>{{ $autor->Nome }}</option>
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
                            @foreach($assuntos as $assunto)
                                <option value="{{ $assunto->CodAs }}" {{ (collect(old('assuntos'))->contains($assunto->CodAs)) ? 'selected':'' }}>{{ $assunto->Descricao }}</option>
                            @endforeach
                        </select>
                        @error('assuntos')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
