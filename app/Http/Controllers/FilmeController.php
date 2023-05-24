<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\CategoriaFilme;
use Illuminate\Support\Facades\Storage; 

class FilmeController extends Controller
{
    function index()
    {
        $filmes = Filme::All();
        // dd($usuarios);

        return view('FilmeList')->with(['filmes' => $filmes]);
    }

    function create()
    {
        $categoriafilmes = Categoriafilme::orderBy('nome')->get();

        return view('FilmeForm')->with(['categoriafilmes' => $categoriafilmes]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'horario' => 'required | max: 50',
                'sinopse' => 'required  | max: 500',
                'categoriafilme_id' => ' nullable',
                'imagemfilme' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'horario.required' => 'O horário é obrigatório',
                'horario.max' => 'Só é permitido 50 caracteres',
                'sinopse.required' => 'A sinopse é obrigatória',
                'sinopse.max' => 'Só é permitido 500 caracteres',
            ]
        );

        $dados = [
            'nome' => $request->nome,
            'horario' => $request->horario,
            'sinopse' => $request->sinopse,
            'categoriafilme_id' => $request->categoriafilme_id,
        ];

        $imagemfilme = $request->file('imagemfilme');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagemfilme) {
            $nome_arquivo = date('YmdHis') . '.' . $imagemfilme->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagemfilme->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagemfilme'] = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        //passa o vetor com os dados do formulário como parametro para ser salvo
        Filme::create($dados);

        return \redirect('filme')->with('success', 'Cadastrado com sucesso!');
    }
    function edit($id)
    {
        //select * from usuario where id = $id;
        $filme = Filme::findOrFail($id);
        //dd($usuario);
        $categoriafilmes = Categoriafilme::orderBy('nome')->get();

        return view('FilmeForm')->with([
            'filme' => $filme,
            'categoriafilmes' => $categoriafilmes,
        ]);
    }

    function show($id)
    {
        //select * from usuario where id = $id;
        $filme = Filme::findOrFail($id);
        //dd($usuario);
        $categoriafilmes = Categoriafilme::orderBy('nome')->get();

        return view('FilmeForm')->with([
            'filme' => $filme,
            'categoriafilmes' => $categoriafilmes,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'horario' => 'required | max: 50',
                'sinopse' => 'required  | max: 500',
                'categoriafilme_id' => ' nullable',
                'imagemfilme' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'horario.required' => 'O horário é obrigatório',
                'horario.max' => 'Só é permitido 50 caracteres',
                'sinopse.required' => 'A sinopse é obrigatória',
                'sinopse.max' => 'Só é permitido 500 caracteres',
            ]
        );
        $dados = [
            'nome' => $request->nome,
            'horario' => $request->horario,
            'sinopse' => $request->sinopse,
            'categoriafilme_id' => $request->categoriafilme_id,
        ];

        $imagemfilme = $request->file('imagemfilme');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagemfilme) {
            $nome_arquivo = date('YmdHis') . '.' . $imagemfilme->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagemfilme->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagemfilme'] = $diretorio . $nome_arquivo;
        }

        Filme::updateOrCreate(
            ['id' => $request->id],
           $dados
        );

        return \redirect()->action(
            'App\Http\Controllers\FilmeController@index'
        );
    }
    //

    function destroy($id)
    {
        $filme = Filme::findOrFail($id);
        if($filme->imagemfilme){
            Storage::disk('public')->delete($filme->imagemfilme);
        }
        $filme->delete();

        return \redirect()->action(
            'App\Http\Controllers\FilmeController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $filmes = Filme::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $filmes = Filme::all();
        }

        //dd($usuarios);
        return view('FilmeList')->with(['filmes' => $filmes]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build
