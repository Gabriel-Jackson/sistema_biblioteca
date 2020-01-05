<?php

class homeController extends controller
{
    public function index(){
        $livro = new livro ();
        $livros = array();
        foreach($livro->getLivros() as $l ){
            $l['status'] = $livro->getStatus($l['id']);
            $livros[] = $l;
        }

        $dados = array(
            'livros' => $livros
        );

        $this->loadTemplate('home',$dados);
    }
}

