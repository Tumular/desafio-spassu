<nav class="navbar navbar-expand-lg navbar-light bg-light menu">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item menu-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('principal') }}"><span>Principal</span></a>
                </li>
                {{-- Menu Autores --}}
                <li class="nav-item dropdown menu-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Autor
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a href="{{ route('autores.create') }}"><span>Cadastrar</span></a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="{{ route('autores.index') }}"><span>Listar</span></a></li>
                    </ul>
                </li>
                {{-- Menu Assuntos --}}
                <li class="nav-item dropdown menu-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Assunto
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a href="{{ route('assuntos.create') }}"><span>Cadastrar</span></a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="{{ route('assuntos.index') }}"><span>Listar</span></a></li>
                    </ul>
                </li>
                {{-- Menu Livros --}}
                <li class="nav-item dropdown menu-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Livro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a href="{{ route('livros.create') }}"><span>Cadastrar</span></a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="{{ route('livros.index') }}"><span>Listar</span></a></li>
                    </ul>
                </li>
                <li class="nav-item menu-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('relatorio.index') }}"><span>Relatório</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
