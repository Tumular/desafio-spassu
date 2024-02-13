@extends('layouts.app')

@section('title', 'Principal')

@section('content')
    <h1 class="text-center">Bem-vindo à Libellus</h1>

    <div class="containerMain">
        <div class="card">
            <div class="card-body text-center">
                <h2>Livros</h2>
                <p class="mb-0">{{ App\Models\Livro::count() }} registros</p>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <a href="{{ route('livros.index') }}" class="btn btn-primary me-2">Listar</a>
                    <a href="{{ route('livros.create') }}" class="btn btn-success">Cadastrar</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-center">
                <h2>Assuntos</h2>
                <p class="mb-0">{{ App\Models\Assunto::count() }} registros</p>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <a href="{{ route('assuntos.index') }}" class="btn btn-primary me-2">Listar</a>
                    <a href="{{ route('assuntos.create') }}" class="btn btn-success">Cadastrar</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-center">
                <h2>Autores</h2>
                <p class="mb-0">{{ App\Models\Autor::count() }} registros</p>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <a href="{{ route('autores.index') }}" class="btn btn-primary me-2">Listar</a>
                    <a href="{{ route('autores.create') }}" class="btn btn-success">Cadastrar</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-center">
                <h2>Relátorio</h2>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <a href="{{ route('relatorio.index') }}" class="btn btn-primary me-2">Consultar</a>
                </div>
            </div>
        </div>
    </div>
