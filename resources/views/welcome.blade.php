@extends('layouts/site')

@section('content')
    
    <div class="container">
        <div class="row center">
            <h1>
                Sistema Biblioteca
            </h1>
        </div>
        <div class="row center">
            @auth
                <h4>Seja Bem-vindo {{Auth::user()->nome}}</h4>
                <p> Esse é um sistema para controle de retiradas e devoluções de livros. <br> Use Nossa Barra de Navegação para guiar-se atrevés dos menus</p>
            @endauth
        </div>
    </div>
@endsection