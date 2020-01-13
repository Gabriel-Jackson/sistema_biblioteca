<?php


namespace App\Controllers;


use App\Models\Acao;
use Core\BaseController;
use Core\Container;
use Core\Redirect;
use Core\Session;

class LivrosController extends BaseController
{
    public function index(){
        if(isset($_SESSION['success'])){
            $this->view->success = $_SESSION['success'];
            Session::destroy('success');
        }
        if(isset($_SESSION['errors'])){
            $this->view->errors = $_SESSION['errors'];
            Session::destroy('errors');
        }
        $model = Container::getModel('Livro');

        $this->setPageTitle('Livros');
        $this->view->livros = $model->All();
        foreach ($this->view->livros as $livro){

            $livro->status = Acao::getStatus($livro->id,$model);
        }
        $this->loadView('Livros/index','layout');
    }
    public function show($id){
        $model = Container::getModel('Livro');
        $this->view->livro = $model->findByID($id);
        $this->view->livro->status = Acao::getStatus($id,$model);
        $this->view->livro->data_entrega = Acao::getDataEntrega($id,$model);
        $this->setPageTitle($this->view->livro->titulo);
        $this->loadView('Livros/show','layout');
    }
    public function  retirar($id){
        $model = Container::getModel('Acao');
        $retirar = $model->retirar($id);

        if($retirar){
            $message = [
                "success" => ["Retirado com sucesso"]
            ];
        }else{
            $message = [
                "errors" => ["Ocorreu um erro ao retirar o livro"]
            ];
        }
        Redirect::route('/livros',$message);

    }
    public function  devolver($id){
        $model = Container::getModel('Acao');
        $devolver = $model->devolver($id);

        if($devolver){
            $message = [
                "success" => ["Devolvido com sucesso!"]
            ];
        }else{
            $message = [
                "errors" => ["Ocorreu um erro ao devolver o livro"]
            ];
        }
        Redirect::route('/livros',$message);
    }
    public function delete($id){
        $model = Container::getModel('Livro');
        $delete = $model->delete($id);
        if($delete){
            $message = [
                "success" => ["Deletado com sucesso!"]
            ];
        }else{
            $message = [
                "errors" => ["Ocorreu um erro ao deletar o livro"]
            ];
        }
        Redirect::route('/livros',$message);
    }
}