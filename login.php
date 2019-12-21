<?php 
session_start();
require_once "config/connect.php";
if(isset($_SESSION['user'])){
    header('Location: http://localhost:8090/');
}else {


    if(isset($_POST['user'])){
        $userName = addslashes($_POST['user']);
        $pass = md5($_POST['password']);
        $userQuery = $connect->query("SELECT * FROM users WHERE nome='$userName' AND senha = '$pass' ")or die(print_r($connect->errorInfo(), true));
        if($userQuery->rowCount() > 0){
            $_SESSION['user'] = $userName;
            $user = $userQuery->fetch();
            if($user['privilegio'] == 0){
                $_SESSION['privilegio'] = "admin";
            }else{
                $_SESSION['privilegio'] = "user";
            }
            header('Location: http://localhost:8090/');
        }else{
            echo "<script> window.alert('$pass');
                        window.location.href = 'http://localhost:8090/' ;</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link href="/public/css/bootstrap.css" rel="stylesheet">
        <link href="/public/css/style.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" action="login.php" method="POST">
            <img class="mb-4 rounded" src="/public/image/login.jpg" alt="" width="200" heigth="200">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <label for="inputUser" class="sr-only">Usuário</label>
            <input type="text" id="inputUser" class="form-control" name="user" placeholder="Usuário" required="true" autofocus="">
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Senha" required="true">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
        </form>
    </body>
</html>

<?php }?>