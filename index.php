<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header('Location: http://localhost:8090/app/login.php');
  }else{
  require_once ("config/connect.php");

  $filterUrl = "";
  $max_entries = 3;
  $filterQuery = "";

  if(!isset($_GET['pagina']) || empty($_GET['pagina'])){
    $pagina = 0;
  }else{
    $pagina =  intval($_GET['pagina']);
  }

  if(isset($_GET['term'])){
    $url = explode("?",$_SERVER['REQUEST_URI']);
    $filterUrl = explode("&", $url[1],2);
    $filterUrl = "&".$filterUrl[1];

    $term = addslashes($_GET['term']);

    if(isset($_GET['filtro'])){
      $filtro = addslashes($_GET['filtro']);
      $filterQuery = "WHERE $filtro LIKE '%$term%'";
    }else {
      $filterQuery = "WHERE titulo LIKE '%$term%'";
    }
  }

  

  $todoslivros = $connect->query("SELECT * FROM livros $filterQuery");

  $num_pags = $todoslivros->rowCount()/$max_entries;
  

  $livros = $connect->query("SELECT L.id,L.titulo,L.autor, R.data_Entrega, R.data_Retirada FROM livros AS L LEFT JOIN `Ret/Dev` AS R ON L.id = R.id_Livro $filterQuery
  LIMIT ".($pagina*$max_entries).",$max_entries");



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema Bibliotecário</title>
  <link rel="stylesheet" href="/public/css/bootstrap.css">
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <?php if(!isset($term)) {
    echo '<form class="form-inline my-2 my-lg-0" action="" method="GET">
      <div class="input-group">
        <input class="form-control bg-dark text-light" name="term" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-dark border my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>';
    } ?>
  </div>
</nav>
    <?php else { 
      echo "sem termos";
    } ?>
  <table class="table table-striped mt-3 mb-3">
  <thead>
  <th>Livro</th>
  <th>Autor</th>
  <th>Status</th>
  <th>...</th>
  </thead>
  <tbody>
  <?php
    foreach ($livros->fetchAll() as $livro ) {
      $status = "";

      if($livro['data_Entrega'] == null && $livro['data_Retirada'] != null){
        $status = "Retirado";
      }else{
        $status = "Disponível";
      }
      echo  "<tr border='1px'>";
      echo "<td>".$livro[titulo]."</td>";
      echo "<td>".$livro[autor]."</td>";
      echo "<td>$status</td>";
      echo "<td>  
              <div class='dropdown'>
                <button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></button>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                  <a class='dropdown-item' href='/app/actions.php?opt=retirar&id=".$livro[id]."'>Retirar</a>
                  <a class='dropdown-item' href='/app/actions.php?opt=devolver&id=".$livro[id]."'>Devolver</a>
              </div>
              </div>
            </td>";
      echo "</tr>";
    }
    /*<td>Percy Jackson e o Ladrão de Raios</td>
    <td>Rick Riordan</td>
    */
  ?>
  </tbody>
  </table>
    <nav aria-label="Page navigation">
      <ul class="pagination">
      
        <?php
          if($pagina > 0 && $num_pags != 1){
          echo "<li class='page-item' aria-current='page'>
                  <a class='page-link' href='".$_SERVER['PHP_SELF'].
                  "?pagina=".($pagina-1).$filterUrl."'> <- </a>
              </li>
              "; 
          }
          for ($i = 0; $i < $num_pags; $i ++) {
            echo "<li class='page-item' aria-current='page'>
                  <a class='page-link' href='".$_SERVER['PHP_SELF'].
                  "?pagina=".($i).$filterUrl."'> ".($i + 1)."</a>
              </li>
              ";
          }
          if($pagina < $num_pags-1 && $num_pags != 1){
            echo "<li class='page-item' aria-current='page'>
                  <a class='page-link' href='".$_SERVER['PHP_SELF'].
                  "?pagina=".($pagina+1).$filterUrl."'> -> </a>
              </li>
              ";
            }
        ?>
      </ul>
    </nav>
    
  </div>

  <script src="/public/js/jquery.js"></script>
  <script src="/public/js/bootstrap.bundle.js"></script>
</body>
</html>

<?php } ?>