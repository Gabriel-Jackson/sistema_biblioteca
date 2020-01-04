<?php
session_start();
class loginController extends controller
{
    public function index(){
        $user = new user();
        $user->setUserName($_POST['user']);
        $user->setUserPass($_POST['password']);

        $userLogged = $user->validateUser();
        $this->loadView('login');
    }
    public function validate (){
        $user = new user();
        $user->setUserName($_POST['user']);
        $user->setUserPass($_POST['password']);

        $userLogged = $user->validateUser();
        if($userLogged != null){
            $_SESSION['userName'] = $userLogged['name'];
            $_SESSION['userId'] = $userLogged['id'];
            $_SESSION['userPrivilege'] = $userLogged['privilege'];
            header("Location: http://localhost:8090/");
        }
        
    }
}

