<?php
use controller;

class usersController extends controller
{
    public function index(){
        $user = new usuario();
        $dados = array(
            'users' => $user->getUsers()
        );
        $this->loadTemplate('usersHome',$dados);
    }
    public function add(){
        $this->loadTemplate('usersAdd');
    }
    public function info(){
        $user = new usuario();
        $user->setId($_GET['id']);
        $dados = array(
            'user' => $user->getUser()
        );
        $this->loadTemplate('user', $dados);
    }
}

