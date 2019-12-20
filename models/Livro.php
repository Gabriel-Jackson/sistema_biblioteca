<?php
class Livro
{
    private $id;

    private $titulo;

    private $autor;

    public function get( String $prop){
        switch ($prop) {
            case 'id':
                return $id;
                break;
            case 'titulo':
                return $titulo;
                break;
            case 'autor':
                return $autor;
                break;
        } 
    }

    public function set(String $prop, String $val)
    {
        switch ($prop) {
            case 'id':
                $id = intval($val);
                break;
            case 'titulo':
                $titulo = $val;
                break;
            case 'autor':
                $autor = $val;
                break;
        }
    }
}

