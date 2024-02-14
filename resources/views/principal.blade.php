@extends('layouts.app')

@section('title', 'Principal')

@section('content')
    <div class="bloco">
        <h1 class="text-center titulo-sistema">Libellus</h1>
        <hr>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="titulo-principal text-center mb-2">Livros</div>
                <div class="text-center mb-2">{{ App\Models\Livro::count() }} registros</div>
                <div class="d-grid gap-2">
                    <a href="{{ route('livros.index') }}" class="btn btn-principal">Listar</a>
                    <a href="{{ route('livros.create') }}" class="btn btn-principal">Cadastrar</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="titulo-principal text-center mb-2">Assuntos</div>
                <div class="text-center mb-2">{{ App\Models\Assunto::count() }} registros</div>
                <div class="d-grid gap-2">
                    <a href="{{ route('assuntos.index') }}" class="btn btn-principal">Listar</a>
                    <a href="{{ route('assuntos.create') }}" class="btn btn-principal">Cadastrar</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="titulo-principal text-center mb-2">Autores</div>
                <div class="text-center mb-2">{{ App\Models\Autor::count() }} registros</div>
                <div class="d-grid gap-2">
                    <a href="{{ route('autores.index') }}" class="btn btn-principal">Listar</a>
                    <a href="{{ route('autores.create') }}" class="btn btn-principal">Cadastrar</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="titulo-principal text-center mb-2">Relatório</div>
                <div class="text-center mb-2 pb-4"></div>
                <div class="d-grid gap-2">
                    <a href="{{ route('relatorio.index') }}" class="btn btn-principal">Consultar</a>
                </div>
            </div>
        </div>
    </div>


@endsection
