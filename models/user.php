<?php
class user extends model
{
    private $id;
    private $userName;
    private $userPass;
    private $userPrivilege;
    function __construct() {
        session_start();

        if (isset($_POST["login"])) {
            $this->logar();
        }
    }
    private function logar(){
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
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
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


