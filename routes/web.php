<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ PrincipalController, SobreNosController, ContatoController,
                           FornecedorController, ClienteController, ProdutoController };
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('site.sobrenos');
Route::get('/contato',[ContatoController::class, 'index'])->name('site.contato');
Route::get('/login', function () { return 'login'; })->name('site.login');

Route::group(['prefix' => 'app'], function() {
    Route::get('/clientes', [ClienteController::class, 'index'])->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('app.produtos');
});

Route::fallback( function(){
    return 'Rota nao encontrada! Clique <a href="'.route('site.index').'">aqui</a> para retornar para a página incial!';
});
