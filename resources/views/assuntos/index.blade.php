@extends('layouts.app')

@section('title', 'Assuntos - Listagem')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-2">
            <span class="m-0 titulo-pagina">Assuntos cadastrados</span>
            <a href="{{ route('assuntos.create') }}" class="btn btn-sm btn-success" title="Adicionar"><i class="fas fa-plus"></i> Adicionar</a>
        </div>
        <hr>
        <table id="myTable" class="table display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assuntos as $assunto)
                    <tr>
                        <td>{{ $assunto->CodAs }}</td>
                        <td>{{ $assunto->Descricao }}</td>
                        <td>
                            <a href="{{ route('assuntos.edit', $assunto->CodAs) }}" class="btn btn-sm btn-acao" title="Editar"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('assuntos.destroy', $assunto->CodAs) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-cancela" onclick="return confirm('Tem certeza que deseja excluir este assunto?')" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
