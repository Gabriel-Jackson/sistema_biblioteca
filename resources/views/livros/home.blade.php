@extends('layouts.site')

@section('content')
    <div class="">
        <br>
        <div class="row">
            <a class="btn left" href="{{route('livros.add')}}">
                Adicionar livro<i class="material-icons right">add</i>
            </a>
        </div>
        
        <table>
            <thead>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Opções</th>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr @if ($livro->status == "Atrasado")
                        class="red-text darken-3"
                    @endif>
                        <td>{{$livro->titulo}}</td>
                        <td>{{$livro->autor}}</td>
                        <td>{{$livro->status}}</td>
                        <td><a class="black-text" href="{{route('livros.show',$livro->id)}}"><i class="material-icons ">more_horiz</i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{$livros->links()}}
    </div>
    
@endsection