<?php
class usuario extends model
{
    private $id;
    private $userName;
    private $userPass;
    private $userPrivilege;
    
    function __construct() {
        parent::__construct();
        session_start();

        if (isset($_POST["login"])) {
            $this->logar();
        }
    }
    public function getUsers(){
        $sql = "SELECT id, users.name, privilege FROM users";
        $sql = $this->db->query($sql);
        $users = $sql->fetchAll();
        return $users;
    }

    public function getUser(){

        $sql = "SELECT users.name, privilege from users where id =".$this->getId()."";
        $sql = $this->db->query($sql)or die(print_r($this->db->errorInfo(), true));;

        $user = $sql->fetch();

        return $user;
    }

    public function getUserLast5Actions (){
        $sql = "SELECT R.data_retirada, R.data_devolucao, L.titulo from `Ret/Dev` as R LEFT JOIN livros as L on 
        R.id_user = ".$this->getId()." LIMIT 2";
    }
    private function logar(){
        $this->userName = $_POST['user'];
        $this->userPass = $_POST['password'];

        $sql = "SELECT * FROM users WHERE name='$this->userName' and pass=md5('$this->userPass')";
        $sql = $this->db->query($sql);
        $user = $sql->fetch();
        if($sql->rowCount() > 0){
            $_SESSION['userName'] = $user['name'];
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userPrivilege'] = $user['privilege'];
        }else{
            return null;
        }
    }

    public function isUserLoggedIn()
    {
        if (isset($_SESSION['userName'])) {
            return true;
        }
        // default return
        return false;
    }

    function __call($metodo, $parametros){
        // Selecionando os 3 primeiros caracteres do método chamado
        $prefixo  = substr($metodo, 0, 3);
        $variavel = substr($metodo, 4);
        // se for set*, "seta" um valor para a propriedade
        if ($prefixo == 'set')
        {
            $this->$variavel = $parametros[0];
        }
        // se for get*, retorna o valor da propriedade
        elseif ($prefixo  == 'get')
        {
            return $this->$variavel;
        }
        // Retorna exception dizendo que não existe o método chamada
        else
        {
            throw new Exception('O método ' . $metodo . ' não existe!');
        }
        }
    }


