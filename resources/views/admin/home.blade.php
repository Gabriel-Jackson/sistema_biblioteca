@extends('layouts.site')

@section('content')
    <div class="">
        <!--<div class="row">
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
        </div>-->
        <h1>Ações</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>Tipo</th>
                <th>Usuário</th>
                <th>Livro</th>
                <th>Realizada em:</th>
            </thead>
            <tbody>
                @foreach ($acoes as $acao)
                    <tr>
                        <td>{{$acao->id}}</td>
                        <td>{{$acao->tipo}}</td>
                        <td>{{$acao->user->nome}}</td>
                        <td>@if($acao->tipo != "Exclusão")
                                {{$acao->livro->titulo}}
                            @else
                                {{$acao->livro_exc}}
                            @endif
                        </td>
                        <td>{{date_format(new DateTime($acao->data_acao),"d/m/Y")}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{$acoes->links()}}
    </div>
    
@endsection