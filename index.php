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

  $livros = $connect->query("SELECT * FROM livros
  LIMIT ".($pagina*$max_entries).",$max_entries");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema Bibliotecário</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  
  <table>
  <thead>
  <th>Livro</th>
  <th>Autor</th>
  <th>Status</th>
  <th>...</th>
  </thead>
  <tbody>
  <?php
    foreach ($livros->fetchAll() as $livro ) {
      echo  "<tr border='1px'>";
      echo "<td>".$livro[titulo]."</td>";
      echo "<td>".$livro[autor]."</td>";
      echo "<td>Disponível</td>";
      echo "<td>  ...  </td>";
      echo "</tr>";
    }
    /*<td>Percy Jackson e o Ladrão de Raios</td>
    <td>Rick Riordan</td>
    */
  ?>
  </tbody>
  </table>
  <div>
  <?php
    if($pagina > 0 && $num_pags != 1){
    echo "<a href='".$_SERVER['PHP_SELF'].
        "?pagina=".($pagina-1)."'> <- </a>"; 
    }
    for ($i = 0; $i < $num_pags; $i ++) {
      echo "<a href='".$_SERVER['PHP_SELF'].
      "?pagina=$i'> ".($i+1) ."</a>";
    }
    if($pagina < $num_pags-1 && $num_pags != 1){
      echo "<a href='".$_SERVER['PHP_SELF'].
          "?pagina=".($pagina+1)."'> -> </a>"; 
      }

      
  ?>
  </div>
</body>
</html>