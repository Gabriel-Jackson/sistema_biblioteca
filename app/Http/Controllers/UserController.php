<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::paginate(15);
        return view('users.home',['users' => $users]);
    }

    public function add(){

        return view('users.add');
    }

    public function save(Request $request){
        //Valida as Informações Recebidas
        $this->validate($request, [
            'nome' => 'required|string',
            'login' => 'required|string',
            'password' => 'required|string|min:4',
            'confirmPassword' => 'required|same:password',
            'privilege' => 'required|string'
        ]);
        // Se validar pega os dados do request
        $data = $request->all();
        //instancia um novo livro
        $user = new User;
        

        //adicona os valores passados no usuário 
        $user->nome = $data['nome'];
        $user->login = $data['login'];
        $user->privilege = $data['privilege'];
        $user->password = Hash::make($data['password']);

        //salva o usuário no Banco de Dados
        $addUser = $user->save();

        //se salvar retorna pra página inicial
        //com mensagem de sucesso
        if($addUser){
            \Session::flash('mensagem', ['msg' => 'Usuário adicionado com sucesso', 'class' => 'green white-text']);
            return redirect()->route('users');
        }
        //se falhar, retorna para página de adição
        //com mensagem de erro
        \Session::flash('mensagem', ['msg' => 'Erro ao adicionar usuário', 'class' => 'red white-text']);
        return redirect()->back();
        
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit',['user' => $user]);
    }

    public function update(int $id,Request $request){
        //instancia um novo livro
        $user = User::find($id);
        
        //Valida as Informações Recebidas
        $this->validate($request, [
            'nome' => 'required|string',
            'login' => 'required|string',
            'password' => 'string|min:4',
            'privilege' => 'string'
        ]);
        // Se validar pega os dados do request
        $data = $request->all();
        

        //adicona os valores passados no usuário 
        $user->nome = $data['nome'];
        $user->login = $data['login'];
        $user->privilege = (isset($data['privilege'])) ? $data['privilege'] : $user->privilege;
        if($data['password']){
            if(!$data['oldPassword'] || !Hash::check($data["oldPassword"], $user->password)){
                \Session::flash('mensagem', ['msg' => 'Senha atual incorreta ou não informada!', 'class' => 'red white-text']);
                return redirect()->back();
            }
            $user->password = Hash::make($data['password']);
        }
        //salva o usuário no Banco de Dados
        $updateUser = $user->save();

        //se salvar retorna pra página inicial
        //com mensagem de sucesso
        if($updateUser){
            \Session::flash('mensagem', ['msg' => 'Usuário atualizado com sucesso', 'class' => 'green white-text']);
            return redirect()->route('users');
        }
        //se falhar, retorna para página de adição
        //com mensagem de erro
        \Session::flash('mensagem', ['msg' => 'Erro ao atualizar usuário', 'class' => 'red white-text']);
        return redirect()->back();
        
    }
    
    public function delete(int $id){
        $user = User::find($id);

        $delUser = $user->delete();
        if($delUser){
            \Session::flash('mensagem',['msg' =>'Usuário excluído com sucesso', 'class' => 'yellow black-text']);
            return redirect()->route('users');
        }
        \Session::flash('mensagem',['msg' =>'Ocorreu um erro ao excluir o usuário', 'class' => 'red white-text']);
            return redirect()->route('users');
    }
}
