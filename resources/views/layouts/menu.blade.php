
<div class="menu">
    <!-- Menu de Autores -->
    <div class="menu-item">
        <a href="{{ route('home') }}"><span>Principal</span></a>
    </div>
    <!-- Menu de Autores -->
    <div class="menu-item">
        <span>Autor</span>
        <div class="dropdown">
            <a href="{{ route('autores.create') }}">Cadastrar</a>
            <a href="{{ route('autores.index') }}">Listar</a>
        </div>
    </div>

    <!-- Menu de Livros -->
    <div class="menu-item">
        <span>Livro</span>
        <div class="dropdown">
            <a href="{{ route('livros.create') }}">Cadastrar</a>
            <a href="{{ route('livros.index') }}">Listar</a>
        </div>
    </div>

    <!-- Menu de Assuntos -->
    <div class="menu-item">
        <span>Assunto</span>
        <div class="dropdown">
            <a href="{{ route('assuntos.create') }}">Cadastrar</a>
            <a href="{{ route('assuntos.index') }}">Listar</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.menu-item').click(function() {
        $(this).children('.dropdown').toggle();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.menu-item').length) {
            $('.dropdown').hide();
        }
    });
</script>
