<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function acoes(){
        return $this->hasMany('App\Acao');
    }
}
