@extends('layouts.app')

@section('title', 'Principal')

@section('content')
    <h1>Bem-vindo à Libellus</h1>
    <div class="list-group">
        <a href="{{ route('livros.index') }}" class="list-group-item list-group-item-action">Cadastar Livros</a>
        <a href="{{ route('autores.index') }}" class="list-group-item list-group-item-action">Cadastar Autores</a>
        <a href="{{ route('assuntos.index') }}" class="list-group-item list-group-item-action">Cadastar Assuntos</a>
    </div>
@endsection
