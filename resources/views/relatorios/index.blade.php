@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
    <div class="bloco">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="m-0 titulo-pagina">Relatório</span>
        </div>
        <hr>
        <table id="relatorio-table" class="table">
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Livro</th>
                    <th>Editora</th>
                    <th>Edição</th>
                    <th>Preço</th>
                    <th>Publicação</th>
                    <th>Assuntos</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#relatorio-table').DataTable({
                    processing: true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'pdf', 'csv'
                    ],
                    ajax: {
                        type: "GET",
                        url: "{{ route('relatorio.dados') }}",
                        dataType: 'json',
                        contentType: 'application/json',
                        datasrc: "data"
                    },
                    columns: [{
                            data: 'Autor'
                        },
                        {
                            data: 'Nome'
                        },
                        {
                            data: 'Editora'
                        },
                        {
                            data: 'Edicao'
                        },
                        {
                            data: 'Preco'
                        },
                        {
                            data: 'AnoPublicacao'
                        },
                        {
                            data: 'Assuntos'
                        }
                    ]
                });
            }, 1000);
        });
    </script>
@endpush
