<?php
session_start();
class loginController extends controller
{
    public function index(){
        $user = new usuario();
        if(!$user->isUserLoggedIn()){
        $this->loadView('login');
        }else{
            header('Location: http://localhost:8090/');
        }
    }
}
?>