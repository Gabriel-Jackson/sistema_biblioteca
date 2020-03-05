<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{env('APP_NAME','Sistema Biblioteca')}}</title>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset("materialize/dist/css/materialize.min.css")}}"  media="screen,projection"/>
</head>
<body>
<header>
    @include('layouts._site._nav')
</header>

<main>
    @include('layouts._site._alerts')
    <div class="container">
        @yield('content')
    </div>
</main>
<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">{{env('APP_NAME','Sistema Biblioteca')}}</h5>
                <a class="grey-text text-lighten-4" href="{{route('livros')}}">Livros</a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            2019-<?= date('Y') ?> | Gabriel Christ da Silva
        </div>
    </div>
</footer>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset("jquery/dist/jquery.js")}}"></script>
<script type="text/javascript" src="{{asset("materialize/dist/js/materialize.min.js")}}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>