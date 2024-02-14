<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libellus - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-5.15.4-web/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">

        @if(Request::route()->getName() != 'home')
            @include('layouts.menu')
        @endif

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-warning mt-3">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bs/popper.min.js') }}"></script>
    <script src="{{ asset('js/bs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#tabela-datatable').DataTable({
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
