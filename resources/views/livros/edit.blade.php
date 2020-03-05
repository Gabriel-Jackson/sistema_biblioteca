@extends('layouts.site')
@section('content')
    <div>
        <h1> Editar Livro </h1>
    <form class="col s12" action="{{route('livros.edit', $livro->id)}}"enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 l8">
                    <input type="text" name="titulo" id="titulo" value="{{$livro->titulo}}">
                    <label for="titulo">Título</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l8">
                    <input type="text" name="autor" id="autor" value="{{$livro->autor}}">
                    <label for="autor">Autor</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l8">
                    <textarea  class="materialize-textarea" type="text" name="sinopse" id="sinopse" data-length="350">{{$livro->sinopse}}</textarea>
                    <label for="sinopse">Sinopse</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12 l8">
                    <div class="btn">
                        <span>Capa</span>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="file-path-wrapper">
                        
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <button class="btn" type="submit">Adicionar</button>
                </div>
            </div>

        </form>
    </div>
@endsection