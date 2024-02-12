@extends('layouts.app')

@section('title', 'Assuntos - Listagem')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="m-0">Assuntos cadastrados</h3>
            <a href="{{ route('assuntos.create') }}" class="btn btn-sm btn-success">Adicionar</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assuntos as $assunto)
                    <tr>
                        <td>{{ $assunto->CodAs }}</td>
                        <td>{{ $assunto->Descricao }}</td>
                        <td>
                            <a href="{{ route('assuntos.edit', $assunto->CodAs) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('assuntos.destroy', $assunto->CodAs) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este assunto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
