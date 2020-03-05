<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    protected $table = 'acoes';

    public function livro(){
        return $this->belongsTo('App\Livro');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
