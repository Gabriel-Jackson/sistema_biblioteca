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
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="" method="GET">
                    <div class="input-group">
                    <input class="form-control bg-dark text-light" name="term" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-dark border my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    </div>
                </form>
            </div>
        </nav>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>

    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/bootstrap.bundle.js"></script>
</body>
</html>