@extends('layouts.site')
@section('content')
    <div>
        <h1> Adicionar Usuário </h1>
    <form class="col s12" action="{{route('users.add')}}"enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 l8">
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l8">
                    <input type="text" name="login" id="login">
                    <label for="login">Login</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l8">
                    <input type="password" name="password" id="password">
                    <label for="password">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" name="confirmPassword" id="confirmPassword">
                    <label for="confirmPassword">Confirmar Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="privilege" id="privilege">
                        <option value="" disabled selected>Nível de Privilégio</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <label for="privilege">Privilégio</label>
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