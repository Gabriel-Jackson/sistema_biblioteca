<div class="container">
    <div class="row">
        <div class="col l6 s12">
            <h5 class="white-text">{{env('APP_NAME','Sistema Biblioteca')}}</h5>

            <ul>
                @auth
                    <li><a class="grey-text text-lighten-4" href="{{route('livros')}}">Livros</a></li>
                    @if (\Auth::user()->privilege == "admin")
                        <li><a class="grey-text text-lighten-4" href="{{route('admin')}}">Ações</a></li>
                        <li><a class="grey-text text-lighten-4" href="{{route('users')}}">Usuários</a></li>
                        <li><a class="grey-text text-lighten-4" href="{{route('config')}}">Configurações</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</div>
<div class="footer-copyright">
    <div class="container">
        ©2019-<?= date('Y') ?> | Gabriel Christ da Silva
    </div>
</div>