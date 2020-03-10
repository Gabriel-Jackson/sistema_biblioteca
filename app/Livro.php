<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function acoes(){
        return $this->hasMany('App\Acao');
    }

    public function search(Array $data,int $totalPage){
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
        })->paginate(intval($totalPage));
        return $results;
    }

    public function getStatusAttribute($value){
        $multaConf = Config::where('param','multa')->first();

        if($value == "Retirado"){
            //pega a última retirada desse livro
            $acao = $this->acoes()->where('tipo', '=', 'Retirada')->latest()->first();

            //pega a data atual
            $data_atual = new DateTime("now");
            
            //pega a data para qual está marcada
            //a entrega
            $data_para_entrega = new DateTime($acao->data_devolucao);
            
            //Se a data de entrega for menor que
            if ($data_para_entrega < $data_atual) {
                $this->multa = floatval(date_diff($data_atual,$data_para_entrega)->days) * floatval($multaConf->value);
                $this->status = "Atrasado";
                $value = "Atrasado";
                $this->update();
            }
        }
        return $value;
    }
}
