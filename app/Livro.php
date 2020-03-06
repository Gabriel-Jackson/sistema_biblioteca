<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function acoes(){
        return $this->hasMany('App\Acao');
    }

    public function search(Array $data){
        $results = $this->where(function ($query) use($data){
            foreach($data as $field => $value){
                if (isset($value)) {
                    if ($field != 'status') {
                        $query->where($field,'like' ,'%'.$value.'%');
                    }else{
                        $query->where($field, $value);
                    }
                }
            }
        })->paginate(15);
        return $results;
    }
}
