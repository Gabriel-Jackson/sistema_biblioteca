<?php
session_start();
class livro extends model
{
    private $id;

    private $titulo;

    private $autor;

    private $status;

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
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getLivros(){
        $array = array();
        
        $sql = "SELECT * FROM livros";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    public function getLivro(){
        $livro = null;
        $sql = "SELECT * FROM livros where id=".$this->id."";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $livro = $sql->fetch();
        }
        
        return $livro;
    }
    public function getStatus($id){
        $sql = "SELECT L.id, R.id as id_ret, R.data_retirada, R.data_devolucao FROM livros as L 
        LEFT JOIN `Ret/Dev` as R  
        on R.id_livro=L.id 
        WHERE L.id=$id
        ORDER BY R.id DESC";
        $sql = $this->db->query($sql);
        $entrie = $sql->fetch(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0){
            if(empty($entrie['data_devolucao'])){
                if(empty($entrie['data_retirada'])){
                    $this->status = "Disponível";
                }else{
                    $this->status = "Retirado";
                }
            }else{
                $this->status = "Disponível";
            }
        }
        return $this->status;
    }

    public function retirarLivro(){
        $sql = "INSERT INTO `Ret/Dev` (data_retirada,id_livro,id_user)
        VALUES (current_timestamp(),".$this->id.",".$_SESSION['userId'].")";
        if($this->status != "Retirado"){
        $this->db->query($sql);
        echo "<script>
            alert('Livro Retirado com Sucesso');
            </script>";
        }else{
            echo "<script>
            alert('Livro já Retirado');
            </script>";
        }
    }
    public function devolverLivro(){
        $sql = "UPDATE `Ret/Dev` SET data_devolucao=CURRENT_TIMESTAMP() 
        WHERE data_devolucao is null AND id_livro=".$this->id."
        ";
        if($this->status != "Disponível"){
            $this->db->query($sql);
            echo "<script>
                alert('Livro Devolvido Com Sucesso');
                </script>";
            }else{
                echo "<script>
                alert('O Livro não está Retirado');
                </script>";
            }
    }
}

