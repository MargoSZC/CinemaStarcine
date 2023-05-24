<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\CategoriaFuncionario;
use Illuminate\Support\Facades\Storage; 

class FuncionarioController extends Controller
{
    function index()
    {
        $funcionarios = Funcionario::All();
        // dd($usuarios);

        return view('FuncionarioList')->with(['funcionarios' => $funcionarios]);
    }

    function create()
    {
        $categoriafuncionarios = Categoriafuncionario::orderBy('nome')->get();

        return view('FuncionarioForm')->with(['categoriafuncionarios' => $categoriafuncionarios]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'salario' => 'required | max: 10',
                'funcao' => 'required  | max: 30',
                'categoriafuncionario_id' => ' nullable',
                'imagemfuncionario' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'salario.required' => 'O salário é obrigatório',
                'salario.max' => 'Só é permitido 10 caracteres',
                'funcao.required' => 'A função é obrigatória',
                'funcao.max' => 'Só é permitido 30 caracteres',
            ]
        );
       
        $dados = [
            'nome' => $request->nome,
            'salario' => $request->salario,
            'funcao' => $request->funcao,
            'categoriafuncionario_id' => $request->categoriafuncionario_id,
        ];

        $imagemfuncionario = $request->file('imagemfuncionario');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagemfuncionario) {
            $nome_arquivo = date('YmdHis') . '.' . $imagemfuncionario->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagemfuncionario->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagemfuncionario'] = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        //passa o vetor com os dados do formulário como parametro para ser salvo
        Funcionario::create($dados);

        return \redirect('funcionario')->with('success', 'Cadastrado com sucesso!');
    }
    function edit($id)
    {
        //select * from usuario where id = $id;
        $funcionario = Funcionario::findOrFail($id);
        //dd($usuario);
        $categoriafuncionarios = Categoriafuncionario::orderBy('nome')->get();

        return view('FuncionarioForm')->with([
            'funcionario' => $funcionario,
            'categoriafuncionarios' => $categoriafuncionarios,
        ]);
    }

    function show($id)
    {
        //select * from usuario where id = $id;
        $funcionario = Funcionario::findOrFail($id);
        //dd($usuario);
        $categoriafuncionarios = Categoriafuncionario::orderBy('nome')->get();

        return view('FuncionarioForm')->with([
            'funcionario' => $funcionario,
            'categoriafuncionarios' => $categoriafuncionarios,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'salario' => 'required | max: 10',
                'funcao' => 'required  | max: 30',
                'categoriafuncionario_id' => ' nullable',
                'imagemfuncionario' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'salario.required' => 'O salário é obrigatório',
                'salario.max' => 'Só é permitido 10 caracteres',
                'funcao.required' => 'A função é obrigatória',
                'funcao.max' => 'Só é permitido 30 caracteres',
            ]
        );

        $dados = [
            'nome' => $request->nome,
            'salario' => $request->salario,
            'funcao' => $request->funcao,
            'categoriafuncionario_id' => $request->categoriafuncionario_id,
        ];

        $imagemfuncionario = $request->file('imagemfuncionario');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagemfuncionario) {
            $nome_arquivo = date('YmdHis') . '.' . $imagemfuncionario->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagemfuncionario->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagemfuncionario'] = $diretorio . $nome_arquivo;
        }

        //dd($dados);

        Funcionario::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect()->action(
            'App\Http\Controllers\FuncionarioController@index'
        );
    }
    //

        function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        if($funcionario->imagemfuncionario){
            Storage::disk('public')->delete($funcionario->imagemfuncionario);
        }
        $funcionario->delete();

        return \redirect()->action(
            'App\Http\Controllers\FuncionarioController@index'
        );
    }
    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $funcionarios = Funcionario::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $funcionarios = Funcionario::all();
        }

        //dd($funcionarios);
        return view('FuncionarioList')->with(['funcionarios' => $funcionarios]);
    }
}

// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
