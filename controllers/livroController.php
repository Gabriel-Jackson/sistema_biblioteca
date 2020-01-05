<?php
use controller;

class livroController extends controller
{
    public function index(){
        $livro = new livro();
        if(!isset($_GET['id'])){
            echo "<script> window.alert('Nenhum Livro Selecionado');
            window.location.href = 'http://localhost:8090/' ;</script>";
            return;
        }
        $livro->setId($_GET['id']);
        $status = $livro->getStatus($livro->getId());

        if(isset($_POST['action'])){
            if($_POST['action'] == "retirar"){
                $livro->retirarLivro();
            }else{
                $livro->devolverLivro();
            }
            $status = $livro->getStatus($livro->getId());
        }
        
        $dados = array(
            'livro' => $livro->getLivro(),
            'status' => $status
        );
        $this->loadTemplate('livro',$dados);
    }

}

