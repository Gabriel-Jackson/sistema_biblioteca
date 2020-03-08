<?php

namespace App\Http\Controllers;

use App\Acao;
use App\Config;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        if (\Auth::user()->privilege == 'admin') {
            $acoes = Acao::paginate(5);
            return view('admin.home', ['acoes' => $acoes]);
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para acessar as configurações', 
            'class' => 'red white-text']);
        return redirect()->route('livros');

    }
    public function config(){
        if (\Auth::user()->privilege == 'admin') {
            $params = Config::pluck('param');
            $values = Config::pluck('value');
            return view('admin.config',[
                'params' => $params,
                'values' => $values
                ]);
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para acessar as configurações', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }
        public function update(Request $request){
        if (\Auth::user()->privilege == 'admin') {
            //seleciona a configuração referente à multa
            $multaConf = Config::where('param', 'multa')->first();
            
            //faz replace nas virgulas e pontos para ficar no padrão do banco de dados
            $multaConf->value = str_replace(["R$",".",",","-"],["","-",".",","],$request['multa']);

            
            
            $diasConf = Config::where('param', 'dias_dev')->first();

            $diasConf->value = $request['dias_dev']." days";

            $updateConfM = $multaConf->update();
            $updateConfD = $diasConf->update();

            if($updateConfD && $updateConfM){
                \Session::flash('mensagem',['msg' => 'Configurações atualizadas com sucesso', 'class' => 'green white-text']);
                return redirect()->back();
            }
            \Session::flash('mensagem',['msg' => 'Erro ao atualizar as configurações ', 'class' => 'red white-text']);
            return redirect()->back();
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para acessar as configurações', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }
}
