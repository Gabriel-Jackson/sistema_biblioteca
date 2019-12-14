<?php 

  require_once ("config/connect.php");

  $livros = $connect->query("SELECT * FROM livros");
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
  <a href="#"><-</a>
  <a href="#">...</a>
  <a href="#">-></a>
  </div>
</body>
</html>