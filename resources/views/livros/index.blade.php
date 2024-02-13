@extends('layouts.app')

@section('title', 'Livros - Listagem')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="m-0">Livros cadastrados</h3>
            <a href="{{ route('livros.create') }}" class="btn btn-sm btn-success">Adicionar</a>
        </div>
        <hr>
        <table id="myTable" class="table display">
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
                                {{ $autor->Nome }},
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
                        <td>
                            <a href="{{ route('livros.edit', $livro->CodI) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('livros.destroy', $livro->CodI) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
