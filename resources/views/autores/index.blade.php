@extends('layouts.app')

@section('title', 'Autores - Listagem')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-2">
            <span class="m-0 titulo-pagina">Autores cadastrados</span>
            <a href="{{ route('autores.create') }}" class="btn btn-sm btn-acao" title="Adicionar"><i class="fas fa-plus"></i> Adicionar</a>
        </div>
        <hr>
        <table id="tabela-datatable" class="table display">
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
                            <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-sm btn-acao" title="Editar"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-cancela{{ $autor->livros()->exists() ? ' disabled' : '' }}" onclick="return confirm('Tem certeza que deseja excluir este autor?')" title="Excluir" {{ $autor->livros()->exists() ? 'disabled' : '' }}><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
