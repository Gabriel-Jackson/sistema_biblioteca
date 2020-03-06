@extends('layouts.site')

@section('content')
    <div class="">
        <br>
        <div class="row">
            <a class="btn left" href="{{route('users.add')}}">
                Adicionar usuário<i class="material-icons right">add</i>
            </a>
        </div>
        
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Privilégio</th>
                <th>Opções</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->nome}}</td>
                        <td>{{$user->privilege}}</td>
                        <td>
                            <a class="black-text" href="{{route('users.edit',$user->id)}}"><i class="material-icons ">edit</i></a>
                            <a class="red-text" href="{{route('users.delete',$user->id)}}"><i class="material-icons ">delete_outline</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{$users->links()}}
    </div>
    
@endsection