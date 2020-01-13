<?php


namespace App\Models;


use Core\BaseModel;
use Core\Container;
use PDO;

class Livro extends BaseModel
{
    protected $table = 'livros';
    private $acao;

}