@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col s5">
            @if (Storage::disk('public')->exists('capas/'.$livro->image))
                <img src="{{asset('storage/capas/'.$livro->image)}}" class="responsive-img rigth" width="250">
            @endif
        </div>
        
        <div class="card grey lighten-4 col s7">
            <div class="">
                <div class="card-title">
                    <span><strong>Informações</strong>
                    <a class="btn-flat waves-effect black-text right" href="{{route('livros.edit',$livro->id)}}"><i class="material-icons">edit</i></a>
                    </span>
                </div>
                <div class="card-content col s12">
                    <p><strong>Título: </strong>{{$livro->titulo}}</p>
                    <p><strong>Autor: </strong>{{$livro->autor}}</p>
                    <p><strong>Status: </strong>{{$livro->status}}</p>
                    <p><strong>Sinopse: </strong>{{$livro->sinopse}}</p>
                </div>

                <div class="card-action">
                    <div class="row">
                        <span class="right">
                        <a href="{{route('livros.retirar',$livro->id)}}" class="btn red white-text @if ($livro->status != "Disponível")
                            disabled
                            @endif">Retirar</a>
                            <a href="{{route('livros.devolver',$livro->id)}}" class="btn green white-text @if ($livro->status == "Disponível")
                                disabled
                                @endif">Devolver</a>
                        </span>
                        <a class="btn red waves-effect white-text left @if ($livro->status != "Disponível")
                            disabled
                            @endif" href="{{route('livros.delete',$livro->id)}}" onclick="return confirm('Deseja excluir este livro?')"><i class="material-icons ">delete_outline</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection