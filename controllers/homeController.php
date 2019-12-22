<?php

class homeController extends controller
{
    public function index(){
        $livro = new livro ();
        $dados = array(
            'livros' => $livro->getLivros()
        );

        $this->loadTemplate('home',$dados);
    }
}

