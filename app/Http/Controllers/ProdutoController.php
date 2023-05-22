<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\CategoriaProduto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    function index()
    {
        $produtos = Produto::All();
        // dd($usuarios);

        return view('ProdutoList')->with(['produtos' => $produtos]);
    }

    function create()
    {
        $categoriaprodutos = Categoriaproduto::orderBy('nome')->get();

        return view('ProdutoForm')->with(['categoriaprodutos' => $categoriaprodutos]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'valor' => 'required | max: 10',
                'tamanho' => 'required  | max: 500',
                'categoriaproduto_id' => ' nullable',
                'imagemproduto' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'valor.required' => 'O horário é obrigatório',
                'valor.max' => 'Só é permitido 10 caracteres',
                'tamanho.required' => 'O tamanho é obrigatório',
                'tamanho.max' => 'Só é permitido 20 caracteres',
            ]
        );

        $imagemproduto = $request->file('imagemproduto');
        $nome_arquivo = '';
        if ($imagemproduto) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagemproduto->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagemproduto->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        Produto::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'tamanho' => $request->tamanho,
            'categoriaproduto_id' => $request->categoriaproduto_id,
            'imagemproduto' => $nome_arquivo,
        ]);

        $dados = [
            'nome' => $request->nome,
            'valor' => $request->valor,
            'tamanho' => $request->tamanho,
            'categoriaproduto_id' => $request->categoriaproduto_id,
        ];

        $imagemproduto = $request->file('imagemproduto');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagemproduto) {
            $nome_arquivo = date('YmdHis') . '.' . $imagemproduto->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagemproduto->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagemproduto'] = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        //passa o vetor com os dados do formulário como parametro para ser salvo
        Produto::create($dados);

        return \redirect('produto')->with('success', 'Cadastrado com sucesso!');
    }

    function edit($id)
    {
        //select * from usuario where id = $id;
        $produto = Produto::findOrFail($id);
        //dd($usuario);
        $categoriaprodutos = Categoriaproduto::orderBy('nome')->get();

        return view('ProdutoForm')->with([
            'produto' => $produto,
            'categoriaprodutos' => $categoriaprodutos,
        ]);
    }

    function show($id)
    {
        //select * from usuario where id = $id;
        $produto = Produto::findOrFail($id);
        //dd($usuario);
        $categoriaprodutos = Categoriaproduto::orderBy('nome')->get();

        return view('ProdutoForm')->with([
            'produto' => $produto,
            'categoriaprodutos' => $categoriaprodutos,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'valor' => 'required | max: 10',
                'tamanho' => 'required  | max: 20',
                'categoriaproduto_id' => ' nullable',
                'imagemproduto' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'valor.required' => 'O horário é obrigatório',
                'valor.max' => 'Só é permitido 10 caracteres',
                'tamanho.required' => 'O tamanho é obrigatório',
                'tamanho.max' => 'Só é permitido 20 caracteres',
            ]
        );

        $dados = [
            'nome' => $request->nome,
            'valor' => $request->valor,
            'tamanho' => $request->tamanho,
            'categoriaproduto_id' => $request->categoriaproduto_id,
        ];

        $imagemproduto = $request->file('imagemproduto');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagemproduto) {
            $nome_arquivo = date('YmdHis') . '.' . $imagemproduto->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagemproduto->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagemproduto'] = $diretorio . $nome_arquivo;
        }

        //dd($dados);

        Produto::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect()->action(
            'App\Http\Controllers\ProdutoController@index'
        );
    }
    //

    function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return \redirect()->action(
            'App\Http\Controllers\ProdutoController@index'
        );
    
    }
    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $produtos = Produto::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $produtos = Produto::all();
        }

        //dd($usuarios);
        return view('ProdutoList')->with(['produtos' => $produtos]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build
