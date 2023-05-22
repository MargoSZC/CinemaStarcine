<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('conecta_mysql', function () {
    return view('conecta_mysql');
})
    ->middleware(['auth', 'verified'])
    ->name('conecta_mysql');

    Route::get('consulta_envio', function () {
        return view('consulta_envio');
    })
        ->middleware(['auth', 'verified'])
        ->name('consulta_envio');

        Route::get('consulta_mac', function () {
            return view('consulta_mac');
        })
            ->middleware(['auth', 'verified'])
            ->name('consulta_mac');

            Route::get('consulta_push', function () {
                return view('consulta_push');
            })
                ->middleware(['auth', 'verified'])
                ->name('consulta_push');

                Route::get('piloto_insert', function () {
                    return view('piloto_insert');
                })
                    ->middleware(['auth', 'verified'])
                    ->name('piloto_insert');

Route::get('dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('cavaleiros', function () {
        return view('cavaleiros');
    })
        ->middleware(['auth', 'verified'])
        ->name('cavaleiros');

        Route::get('comprar', function () {
            return view('comprar');
        })
            ->middleware(['auth', 'verified'])
            ->name('comprar');

            Route::get('donnie', function () {
                return view('donnie');
            })
                ->middleware(['auth', 'verified'])
                ->name('donnie');

                Route::get('guardioesdg', function () {
                    return view('guardioesdg');
                })
                    ->middleware(['auth', 'verified'])
                    ->name('guardioesdg');

                    Route::get('john', function () {
                        return view('john');
                    })
                        ->middleware(['auth', 'verified'])
                        ->name('john');

                        Route::get('supermario', function () {
                            return view('supermario');
                        })
                            ->middleware(['auth', 'verified'])
                            ->name('supermario');

                            Route::get('mortedodemonio', function () {
                                return view('mortedodemonio');
    })
    ->middleware(['auth', 'verified'])
    ->name('mortedodemonio');

    Route::get('velozesf', function () {
    return view('velozesf');
    })
    ->middleware(['auth', 'verified'])
    ->name('velozesf');
    
    Route::get('principal', function () {
        return view('principal');
    })
        ->middleware(['auth', 'verified'])
        ->name('principal');

     Route::get('sobre', function () {
            return view('sobre');
        })
            ->middleware(['auth', 'verified'])
            ->name('sobre');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::post('usuario/search', [UsuarioController::class, 'search']);

    Route::resource('filme', FilmeController::class);
    Route::post('filme/search', [FilmeController::class, 'search']);

    Route::resource('produto', ProdutoController::class);
    Route::post('produto/search', [ProdutoController::class, 'search']);

    Route::resource('funcionario', FuncionarioController::class);
    Route::post('funcionario/search', [FuncionarioController::class, 'search']);



    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';
