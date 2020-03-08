@extends('layouts.site')

@section('content')
    <div class="container">
        <h1>Configurações</h1>
        <form action="#!" method="post">
            {{ csrf_field() }}
            <div class="row">
                
                <div class="input-field col s10">
                    <input type="text" name="multa" value="<?= "R$ ".number_format(floatval($values[1]),"2",",",".")?>">
                    <label for="multa">Multa</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <input type="text" name="dias_dev" value="{{intval($values[0])}}">
                    <label for="dias_dev">Dias para devolução</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <input class="btn" type="submit" value="Atualizar">
                </div>
            </div>
        </form>
    </div>
@endsection