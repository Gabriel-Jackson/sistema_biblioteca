<nav class="navbar blue ">
    <div class="nav-wrapper container">
        <a class="brand-logo" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="{{ route('livros') }}">Livros</a></li>
            <li><a href="{{ route('users') }}">Usuários</a></li>
            <li><a href="{{ route('config') }}">Configurações</a></li>
        </ul>            
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{ route('livros') }}">Livros</a></li>
    <li><a href="{{ route('users') }}">Usuários</a></li>
    <li><a href="{{ route('config') }}">Configurações</a></li>
</ul>