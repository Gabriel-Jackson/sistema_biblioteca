<?php 
  
  require_once ("config/connect.php");
  
  
  $max_entries = 3;
  
  
  $todoslivros = $connect->query("SELECT * FROM livros ");

  $num_pags = $todoslivros->rowCount()/$max_entries;

  if(!isset($_GET['pagina']) || empty($_GET['pagina'])){
    $pagina = 0;
  }else{
    $pagina =  intval($_GET['pagina']);
  }

  $livros = $connect->query("SELECT L.id,L.titulo,L.autor, R.data_Entrega, R.data_Retirada FROM livros AS L LEFT JOIN `Ret/Dev` AS R ON L.id = R.id_Livro
  LIMIT ".($pagina*$max_entries).",$max_entries");



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema Bibliotecário</title>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <div class="container">
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
                  <a class='dropdown-item' href='/actions.php?opt=retirar&id=".$livro[id]."'>Retirar</a>
                  <a class='dropdown-item' href='/actions.php?opt=devolver&id=".$livro[id]."'>Devolver</a>
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
                  "?pagina=".($pagina-1)."'> <- </a>
              </li>
              "; 
          }
          for ($i = 0; $i < $num_pags; $i ++) {
            echo "<li class='page-item' aria-current='page'>
                  <a class='page-link' href='".$_SERVER['PHP_SELF'].
                  "?pagina=".($i)."'> ".($i + 1)."</a>
              </li>
              ";
          }
          if($pagina < $num_pags-1 && $num_pags != 1){
            echo "<li class='page-item' aria-current='page'>
                  <a class='page-link' href='".$_SERVER['PHP_SELF'].
                  "?pagina=".($pagina+1)."'> -> </a>
              </li>
              ";
            }
        ?>
      </ul>
    </nav>
    
  </div>

  <script src="./js/jquery.js"></script>
  <script src="./js/bootstrap.bundle.js"></script>
  <script src=""></script>
</body>
</html>