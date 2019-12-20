<?php 
require_once('config/connect.php');

$data = date("Ymd");
$opt = $_GET['opt'];
$id = $_GET['id'];

if(isset($opt)){
    if($opt == "retirar"){
        $connect->exec("INSERT INTO `Ret/Dev` (id_Livro,id_User,data_Retirada) VALUES ( $id , 1,".$data.")") or die(print_r($connect->errorInfo(), true));
        echo "<script> window.alert('Retirado com Sucesso');
                        window.location.href = 'http://localhost:8090/' ;</script>";
    }else if($opt == 'devolver'){
        $devolucao = $connect->exec("UPDATE `Ret/Dev` SET data_Entrega=$data  WHERE id_Livro = $id and data_Entrega is null");
        if($devolucao > 0){
            echo "<script> window.alert('Devolvido com Sucesso');
                        window.location.href = 'http://localhost:8090/' ;</script>";
        }else{
            echo "<script> window.alert('O Livro Selecionado já está Disponível!');
                        window.location.href = 'http://localhost:8090/' ;</script>";
        }
    }else{
        echo "<script> window.alert('Opção Inválida');
        window.location.href = 'http://localhost:8090/' ;</script>";
    }
}else {
    echo "<script> window.alert('Nenhuma Opção Selecionada');
    window.location.href = 'http://localhost:8090/' ;</script>";
}

?>