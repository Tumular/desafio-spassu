@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-3">
        <h3 class="m-0">Relatório</h3>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
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
                    url : "{{ route('relatorio.dados') }}",
                    dataType: 'json',
                    contentType: 'application/json',
                    datasrc: "data"
                },
                columns: [
                    { data: 'Autor' },
                    { data: 'Nome' },
                    { data: 'Editora' },
                    { data: 'Edicao' },
                    { data: 'Preco' },
                    { data: 'AnoPublicacao' },
                    { data: 'Assuntos' }
                ]
            });
        });
    </script>
@endpush
