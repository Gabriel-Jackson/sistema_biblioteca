<?php

namespace App\Http\Controllers;

use Image;
use App\Acao;
use DateTime;
use App\Livro;
use App\Config;
use Illuminate\Http\Request;

class LivroController extends Controller
{   
    public function index(){
        
        //Seleciona Todos os Livros
        $livros = Livro::all();
        

        $totalItems = 6;
        if(isset($_GET['totalItems'])){
            $totalItems = intval($_GET['totalItems']);
        }

        $livros = Livro::paginate($totalItems);

        return view('livros.home',['livros' => $livros]);
    }
    public function add(){
        if (\Auth::user()->privilege == 'admin') {
        return view('livros.add');
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
                'titulo' => 'required|string',
                'autor' => 'required|string',
                'sinopse' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            // Se validar pega os dados do request
            $data = $request->except('_token');
            //instancia um novo livro
            $livro = new Livro;
            //instancia uma nova ação
            $acao = new Acao;

            //remove a chave _token dos dados
            array_shift($data);
            //seta os valores da ação
            $acao->tipo = "Criação";
            $acao->user_id = \Auth::user()->id;
            $acao->data_acao = date("Y-m-d");
            $acao->data_devolucao = null;

            //se a imagem existir e for valida 
            //faz o tratamento da mesma
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image');
                //cria um nome pra imagem que será salva
                $imagemName = kebab_case($data['titulo'])."" .date('d-m-Y|H:i:s'); 
                //pega a extensão da imagem
                $extension = $request->image->extension();
                
                //pega a imagem
                $img_red = Image::make($image->getRealPath());

                //atualiza o nome da imagem e 
                //salva o mesmo para inserção no Banco 
                //de dados
                $imagemName = "{$imagemName}.{$extension}";
                $data['image'] = $imagemName;

                //faz o upload da imagem já redimensionando
                $upload = $img_red->resize(250,300, function($constraint){
                    $constraint->aspectRatio();
                })->save('storage/capas/'.$imagemName);

                //se o upload falhar,
                //retorna para a página de adição com 
                //uma mensagem de erro
                if(!$upload){
                    \Session::flash('mensagem', ['msg' => 'Erro ao fazer upload da imagem!', 'class' => 'red white-text']);
                    return redirect()->back();
                }
            }
            //adicona os valores passados no livro 
            foreach ($data as $key => $value) {
                $livro->$key = $value;
            }

            //salva o livro no Banco de Dados
            $addLivro = $livro->save();

            //se salvar retorna pra página inicial
            //com mensagem de sucesso
            if($addLivro){
                $acao->livro_id = $livro->id;
                $acao->save();
                \Session::flash('mensagem', ['msg' => 'Livro adicionado com sucesso', 'class' => 'green white-text']);
                return redirect()->route('livros');
            }
            //se falhar, retorna para página de adição
            //com mensagem de erro
            \Session::flash('mensagem', ['msg' => 'Erro ao adicionar livro', 'class' => 'red white-text']);
            return redirect()->back();
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function show($id){
        $livro = Livro::find($id);
        if ($livro->status !="Disponível") {
            //pega a última retirada desse livro
            $acao = $livro->acoes()->where('tipo', '=', 'Retirada')->latest()->first();
        }else{
            $acao = "";
        }
        return view('livros.show',['livro' => $livro, 'acao' => $acao]);
    }

    public function edit($id){
        if (\Auth::user()->privilege == 'admin') {
        $livro = Livro::find($id);
        return view('livros.edit',['livro' => $livro]);
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function update(int $id,Request $request){
        if (\Auth::user()->privilege == 'admin') {
            //Valida as Informações Recebidas
            $this->validate($request, [
                'titulo' => 'required|string',
                'autor' => 'required|string',
                'sinopse' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            // Se validar pega os dados do request
            $data = $request->except('_token');
            //instancia o livro
            $livro = Livro::find($id);

            //instancia uma nova ação
            $acao = new Acao;

            //remove a chave _token dos dados
            array_shift($data);

            //seta os valores da ação
            $acao->tipo = "Edição";
            $acao->user_id = \Auth::user()->id;
            $acao->data_acao = date("Y-m-d");
            $acao->data_devolucao = null;

            //se a imagem existir e for valida 
            //faz o tratamento da mesma
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image');
                //cria um nome pra imagem que será salva
                $imagemName = kebab_case($data['titulo'])."" .date('d-m-Y|H:i:s'); 
                //pega a extensão da imagem
                $extension = $request->image->extension();
                
                //pega a imagem
                $img_red = Image::make($image->getRealPath());

                //atualiza o nome da imagem e 
                //salva o mesmo para inserção no Banco 
                //de dados
                $imagemName = "{$imagemName}.{$extension}";
                $data['image'] = $imagemName;

                //faz o upload da imagem já redimensionando
                $upload = $img_red->resize(250,300, function($constraint){
                    $constraint->aspectRatio();
                })->save('storage/capas/'.$imagemName);

                //se o upload falhar,
                //retorna para a página de adição com 
                //uma mensagem de erro
                if(!$upload){
                    \Session::flash('mensagem', ['msg' => 'Erro ao fazer upload da imagem!', 'class' => 'red white-text']);
                    return redirect()->back();
                }
            }
            //adicona os valores passados no livro 
            foreach ($data as $key => $value) {
                $livro->$key = $value;
            }

            //salva o livro no Banco de Dados
            $updateLivro = $livro->update();

            //se salvar retorna pra página inicial
            //com mensagem de sucesso
            if($updateLivro){
                $acao->livro_id = $id;
                $acao->save();
                \Session::flash('mensagem', ['msg' => 'Livro atualizado com sucesso', 'class' => 'green white-text']);
                return redirect()->route('livros');
            }
            //se falhar, retorna para página de adição
            //com mensagem de erro
            \Session::flash('mensagem', ['msg' => 'Erro ao atualizar o livro', 'class' => 'red white-text']);
            return redirect()->back();
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para realizar essa operação', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function delete(int $id){
        if (\Auth::user()->privilege == 'admin') {
            $livro = Livro::find($id);

            //instancia uma nova ação
            $acao = new Acao;
            //seta os valores da ação
            $acao->tipo = "Exclusão";
            $acao->data_acao = date("Y-m-d");
            $acao->data_devolucao = null;
            $acao->user_id = \Auth::user()->id;
            $acao->livro_exc = $livro->titulo;
            $delLivro = $livro->delete();
            if($delLivro){
                
                $acao->save();
                \Session::flash('mensagem',['msg' =>'Livro excluído com sucesso', 'class' => 'yellow black-text']);
                return redirect()->route('livros');
            }
            \Session::flash('mensagem',['msg' =>'Ocorreu um erro ao excluir o livro', 'class' => 'red white-text']);
            return redirect()->route('livros');
        }
        \Session::flash('mensagem',[
            'msg' => 'Você não tem autorização para excluir livros', 
            'class' => 'red white-text']);
        return redirect()->route('livros');
    }

    public function filter(Request $request,Livro $livro){
        $dataFiltro = $request->except(['_token','page']);
        $totalItems = isset($dataFiltro['totalItems'])? $dataFiltro['totalItems']: 15;
        if(isset($dataFiltro['totalItems'])){
            unset($dataFiltro['totalItems']);
        }
        $livros = $livro->search($dataFiltro,intval($totalItems));

        return view('livros.home',['livros' => $livros,'dataForm' => $dataFiltro,'totalItems' => $totalItems]);

    }

    public function retirar(int $id){
        $livro = Livro::find($id);

        $acao = new Acao;
        $dataDev_conf = Config::where('param','dias_dev')->first();
        $acao->tipo = "Retirada";
        $acao->user_id = \Auth::user()->id;
        $acao->livro_id = $id;
        $acao->data_acao = date("Y-m-d");
        $acao->data_devolucao = date('Y-m-d',strtotime("+".$dataDev_conf->value));
        $livro->status = "Retirado";

        
        $actRetirar = $acao->save();
        if($actRetirar){
            $retirada = $livro->update();

            if ($retirada) {
                \Session::flash('mensagem', ['msg' => 'Livro Retirado com Sucesso!', 'class' => 'green white-text']);
                return redirect()->route('livros');
            }
            $acao->delete();
        }

        \Session::flash('mensagem',['msg' => 'Erro ao retirar livro!', 'class' => 'red white-text']);
            return redirect()->back();
    }

    public function devolver(int $id){
        $livro = Livro::find($id);
        $acao = new Acao;

        $acao->tipo = "Devolução";
        $acao->user_id = \Auth::user()->id;
        $acao->livro_id = $id;
        $acao->data_acao = date("Y-m-d");
        $acao->data_devolucao = null;

        $livro->status = "Disponível";
        $livro->multa = 0;
        $actDevolver = $acao->save();

        if($actDevolver){
            $devolucao = $livro->update();
            if ($devolucao) {
                
                \Session::flash('mensagem', ['msg' => 'Livro devolvido com Sucesso!', 'class' => 'green white-text']);
                return redirect()->route('livros');
            }
            $acao->delete();
        }
        
        \Session::flash('mensagem',['msg' => 'Erro ao devolver livro!', 'class' => 'red white-text']);
        return redirect()->route('livros');
    }
}
