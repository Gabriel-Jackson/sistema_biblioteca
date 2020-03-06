<nav class="navbar blue ">
    <div class="nav-wrapper container">
        <a class="brand-logo" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <ul class="right">
        <li><a href="{{ route('livros') }}">Livros</a></li>
        <li><a href="{{ route('users') }}">Usuários</a></li>
        </ul>            
    </div>
</nav>