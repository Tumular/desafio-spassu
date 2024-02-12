@extends('layouts.app')

@section('title', 'Autores - Listagem')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="m-0">Autores cadastrados</h3>
            <a href="{{ route('autores.create') }}" class="btn btn-sm btn-success">Adicionar</a>
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
                @foreach($autores as $autor)
                    <tr>
                        <td>{{ $autor->CodAu }}</td>
                        <td>{{ $autor->Nome }}</td>
                        <td>
                            <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
