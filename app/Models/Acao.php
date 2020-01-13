<?php


namespace App\Models;


use Core\BaseModel;
use Core\Container;

class Acao extends BaseModel
{
    protected $table = "`Ret/Dev`";
    public static function getDataEntrega($id,$model){
        $query = "SELECT data_para_entrega from `Ret/Dev` WHERE id_Livro={$id} 
            ORDER BY id DESC";

        $entrie = $model->query($query,true);
        return $entrie->data_para_entrega;
    }
    public static function getStatus($id,$model){
        $query = "SELECT L.id, R.id as id_ret, R.data_retirada ,R.data_devolucao FROM livros as L 
        LEFT JOIN `Ret/Dev` as R  
        on R.id_livro=L.id 
        WHERE L.id={$id}
        ORDER BY R.id DESC";

        $entrie = $model->query($query,true);

        if($entrie->data_devolucao == null){
            if($entrie->data_retirada == null){
                return "Disponível";
            }else{
                return "Retirado";
            }
        }else{
            return "Disponível";
        }
}

    public function retirar($id){
        $data = [
            "data_retirada" => date('Y-m-d H:i:s'),
            "data_para_entrega" => date('Y-m-d H:i:s',strtotime("+ 1 week")),
            "id_Livro"  => $id,
            "id_User" => '1'
        ];
        return $this->create($data);
    }

    public function devolver($id){
        $query = "UPDATE `Ret/Dev` SET data_devolucao=CURRENT_TIMESTAMP() 
        WHERE data_devolucao is null AND id_livro=".$id."
        ";
        return $this->query($query);
    }
}