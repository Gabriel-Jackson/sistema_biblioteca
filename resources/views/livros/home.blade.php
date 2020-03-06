@extends('layouts.site')

@section('content')
    <div class="">
        <div class="row">
            <form action="{{route('livros')}}" method="post">
                {{ csrf_field() }}
                <div class="input-field col s4">
                    <input type="text" name="titulo" id="titulo">
                    <label for="titulo">Título</label>
                </div>
                <div class="input-field col s4">
                    <input type="text" name="autor" id="autor">
                    <label for="autor">Autor</label>
                </div>
                <div class="input-field col s4">
                    <select name="status" id="status">
                        <option value="" disabled selected>Status</option>
                        <option value="Disponível">Disponível</option>
                        <option value="Retirado">Retirado</option>
                        <option value="Atrasado">Atrasado</option>
                    </select>
                    <label for="privilege">Privilégio</label>
                </div>
                <div class="row center">
                    <div class="input-field col s4" style="margin-left: 30%">
                        <input class="btn"type="submit" value="Filtrar">
                    </div>
                </div>
            </form>
        </div>
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