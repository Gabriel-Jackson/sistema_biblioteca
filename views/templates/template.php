<?php   
session_start();

if(!isset($_SESSION['userName'])){
    header('Location: http://localhost:8090/login');
}else{
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Bibliotecário</title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/84028ed802.js" crossorigin="anonymous"></script>
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/bootstrap.bundle.js"></script>
</head>
<body>

        
        <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark mb-3">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse aling-self-start" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Retiradas/Devoluções</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Usuários</a>
                    </li>
                </ul>
                <form class="d-flex flex-column justify-content-center form-inline my-2 my-lg-0" action="" method="GET" name="filtro">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control bg-dark text-light" name="term" type="search" placeholder="Procurar livros..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-dark border my-2 my-sm-0 mr-2 rounded-right" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        </div>
                        <button class="btn btn-dark border my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#opcoesFiltro" aria-expanded="true" aria-controls="opcoesFiltro"><i class="fas fa-filter"></i></button>
                    </div>
                    
                        <div class="aling-self-end form-group border p-3 my-2 collapse" id="opcoesFiltro">
                            <div class="form-check form-check-inline text-light">
                                <input id="opcaoAutor" class="form-check-input " type="radio" name="opcao" value="autor" >
                                <label for="opcaoAutor" class="form-check-label">Autor</label>
                            </div>
                            <div class="form-check form-check-inline text-light">
                                <input id="opcaoTitulo" class="form-check-input " type="radio" name="opcao" value="titulo" >
                                <label for="opcaoTitulo" class="form-check-label">Titulo</label>
                            </div>
                            <div class="form-check form-check-inline text-light">
                                <input id="opcaoStatus" class="form-check-input " type="radio" name="opcao" value="status" >
                                <label for="opcaoStatus" class="form-check-label">Status</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        
    <div class="container">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>


</body>
</html>
<?php } ?>