<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libellus - @yield('title')</title>
    <link href="{{ asset('css/bs/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif

        @if(Request::route()->getName() != 'home')
            @include('layouts.menu')
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('js/bs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "buttons": {
                        "excel": "Excel",
                        "pdf": "PDF",
                        "csv": "CSV"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'csv'
                ],
                "columnDefs": [{
                    "targets": -1,
                    "orderable": false
                }]
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
