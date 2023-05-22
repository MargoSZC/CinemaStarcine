<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\CategoriaFilme;

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
                'horario' => 'required | max: 6',
                'sinopse' => 'required  | max: 500',
                'categoriafilme_id' => ' nullable',
                'imagemfilme' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'horario.required' => 'O horário é obrigatório',
                'horario.max' => 'Só é permitido 6 caracteres',
                'sinopse.required' => 'A sinopse é obrigatória',
                'sinopse.max' => 'Só é permitido 500 caracteres',
            ]
        );

        $imagemfilme = $request->file('imagemfilme');
        $nome_arquivo = '';
        if ($imagemfilme) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagemfilme->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagemfilme->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        Filme::create([
            'nome' => $request->nome,
            'horario' => $request->horario,
            'sinopse' => $request->sinopse,
            'categoriafilme_id' => $request->categoriafilme_id,
            'imagemfilme' => $nome_arquivo,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\FilmeController@index'
        );
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
                'horario' => 'required | max: 6',
                'sinopse' => 'required  | max: 500',
                'categoriafilme_id' => ' nullable',
                'imagemfilme' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'horario.required' => 'O horário é obrigatório',
                'horario.max' => 'Só é permitido 6 caracteres',
                'sinopse.required' => 'A sinopse é obrigatória',
                'sinopse.max' => 'Só é permitido 500 caracteres',
            ]
        );

        $imagemfilme = $request->file('imagemfilme');
        $nome_arquivo = '';
        if ($imagemfilme) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagemfilme->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagemfilme->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        Filme::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'horario' => $request->horario,
                'sinopse' => $request->sinopse,
                'categoriafilme_id' => $request->categoriafilme_id,
                'imagemfilme' => $nome_arquivo,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\FilmeController@index'
        );
    }
    //

    function destroy($id)
    {
        $filme = Filme::findOrFail($id);

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
