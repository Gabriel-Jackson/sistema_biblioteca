<?php
namespace App\Controllers;

use App\Models\Acao;
use Core\BaseController;
use Core\Container;


class HomeController extends BaseController
{
    
    public function index(){


        $this->setPageTitle('Home');

        $this->loadView('Home/index', "layout");
    }
}

