@extends('layouts.app')

@section('title', 'Livros - Listagem')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="m-0 titulo-pagina">Livros cadastrados</span>
            <a href="{{ route('livros.create') }}" class="btn btn-sm btn-acao" title="Adicionar"><i class="fas fa-plus"></i> Adicionar</a>
        </div>
        <hr>
        <table id="tabela-datatable" class="table display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome - Autores</th>
                    <th>Assunto</th>
                    <th>Edição</th>
                    <th>Publicação</th>
                    <th>Editora</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                    <tr>
                        <td>{{ $livro->CodI }}</td>
                        <td>
                            {{ $livro->Nome }}<br>
                            @foreach($livro->autores as $autor)
                                <i>{{ $autor->Nome }}</i>,
                            @endforeach
                        </td>
                        <td>
                            @foreach($livro->assuntos as $assunto)
                                {{ $assunto->Descricao }},
                            @endforeach
                        </td>
                        <td>{{ $livro->Edicao }}</td>
                        <td>{{ $livro->AnoPublicacao }}</td>
                        <td>{{ $livro->Editora }}</td>
                        <td>{{ $livro->Preco }}</td>
                        <td nowrap>
                            <a href="{{ route('livros.edit', $livro->CodI) }}" class="btn btn-sm btn-acao" title="Editar"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('livros.destroy', $livro->CodI) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-cancela" onclick="return confirm('Tem certeza que deseja excluir este livro?')" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
