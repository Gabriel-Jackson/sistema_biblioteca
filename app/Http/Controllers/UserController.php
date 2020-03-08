<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if (\Auth::user()->privilege == 'admin') {
            $users = User::paginate(15);
            return view('users.home',['users' => $users]);
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function add(){
        if (\Auth::user()->privilege == 'admin') {
            return view('users.add');
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function save(Request $request){
        if (\Auth::user()->privilege == 'admin') {
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
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function edit($id){
        if (\Auth::user()->privilege == 'admin' || $id == \Auth::id()) {
            $user = User::find($id);
            return view('users.edit',['user' => $user]);
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function update(int $id,Request $request){
        if (\Auth::user()->privilege == 'admin' || $id == \Auth::id()) {
            //instancia um novo livro
            $user = User::find($id);
            
            //Valida as Informações Recebidas
            $this->validate($request, [
                'nome' => 'required|string',
                'login' => 'required|string',
                'password' => 'required_with:oldPassword|string|min:4|nullable',
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
                if ($id == \Auth::user()->id) {
                    \Auth::logout();
                }
                \Session::flash('mensagem', ['msg' => 'Usuário atualizado com sucesso', 'class' => 'green white-text']);
                return redirect()->route('users');
            }
            //se falhar, retorna para página de adição
            //com mensagem de erro
            \Session::flash('mensagem', ['msg' => 'Erro ao atualizar usuário', 'class' => 'red white-text']);
            return redirect()->back();
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }
    
    public function delete(int $id){
        if (\Auth::user()->privilege == 'admin') {
            if ($id != \Auth::user()->id) {
                $user = User::find($id);

                $delUser = $user->delete();
                if ($delUser) {
                    \Session::flash('mensagem', ['msg' =>'Usuário excluído com sucesso', 'class' => 'yellow black-text']);
                    return redirect()->route('users');
                }
                \Session::flash('mensagem', ['msg' =>'Ocorreu um erro ao excluir o usuário', 'class' => 'red white-text']);
                return redirect()->route('users');
            }
            \Session::flash('mensagem', ['msg' =>'Não é permitido excluir um usuário em uso', 'class' => 'red white-text']);
                return redirect()->route('users');
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }
}
