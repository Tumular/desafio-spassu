<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libellus - @yield('title')</title>
    <link href="{{ asset('css/bs/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @include('layouts.menu')

        @yield('content')
    </div>

    <script src="{{ asset('js/bs/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
