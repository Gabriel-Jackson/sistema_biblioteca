<nav class="navbar blue ">
    <div class="nav-wrapper container">
        <a class="brand-logo" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        @auth
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('livros') }}">Livros</a></li>
                @if (\Auth::user()->privilege == 'admin')
                    <li><a href="{{ route('admin') }}">Ações</a></li>
                    <li><a href="{{ route('users') }}">Usuários</a></li>
                    <li><a href="{{ route('config') }}"><i class="material-icons right">settings</i></a></li>
                @endif
                <li>  
                    <a class='dropdown-trigger' href='#' data-target='user-opts' data-constraintwidth="false">
                        <i class="material-icons">person</i>
                    </a>
                </li>
            </ul>
            <ul id='user-opts' class='dropdown-content' >
                <li>
                    <a href="{{route('users.edit',Auth::user()->id)}}">
                        <span class="black-text">
                            {{\Auth::user()->nome}}
                        </span>
                    </a>
                </li>
                <form action="{{route('logout')}}" method="POST">
                @csrf
                <a onclick="$(this).parent().submit();" class=" btn-flat black-text grey lighten-4"><i class="material-icons red-text left">exit_to_app</i>Sair</a>
                </form>
            </ul>
        @endauth            
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    @auth
        <li>
            <div class="user-view">
                <a href="{{route('users.edit',Auth::user()->id)}}"><span class="black-text">{{\Auth::user()->nome}}</span></a>
                <div class="row">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn-flat waves-effect black-text grey lighten-4">
                            Sair <i class="material-icons red-text right">exit_to_app</i>
                        </button>
                    </form>
                </div>
            </div>
        </li>
        <li><div class="divider"></div></li>
        <li><a href="{{ route('livros') }}">Livros</a></li>

        @if (\Auth::user()->privilege == 'admin')
            <li><a href="{{ route('admin') }}">Ações</a></li>
            <li><a href="{{ route('users') }}">Usuários</a></li>
            <li><a href="{{ route('config') }}">Configurações <i class="material-icons right">settings</i></a></li>
        @endif
    @endauth
</ul>