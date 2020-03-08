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
    @include('layouts._site._footer')
</footer>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset("jquery/dist/jquery.js")}}"></script>
<script type="text/javascript" src="{{asset("materialize/dist/js/materialize.min.js")}}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>