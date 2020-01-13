<?php

$route[] = ['/','HomeController@index'];
$route[] = ['/livros','LivrosController@index'];
$route[] = ['/livros/{id}/show','LivrosController@show'];
$route[] = ['/livros/{id}/retirar','LivrosController@retirar'];
$route[] = ['/livros/{id}/devolver','LivrosController@devolver'];
$route[] = ['/livros/{id}/delete','LivrosController@delete'];

return $route;

?>