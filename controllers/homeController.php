<?php
use controller;

class homeController extends controller
{
    public function index(){
        $Livro = new Livro ();
        $Livro->setTitulo('Percy Jackson e o Ladrão de Raios');
        echo "Titulo: ".$Livro->getTitulo();
    }
}

