<?php
class Livro extends model
{
    private $id;
    private $titulo;
    private $autor;

    private $data_Retirada;
    private $data_Entrega;

    public function setId($n)
    {
        $this->id = $n;
    }

    public function getId(){
        return $this->id;
    }

    public function setTitulo($n)
    {
        $this->titulo = $n;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setAutor($n)
    {
        $this->autor = $n;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getLivros(){
        $array = array();

        $sql = "SELECT * FROM livros";
        $sql = $this->db->query($sql)

        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
}

