<?php

use Illuminate\Support\Facades\Route;


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


Route::get('/', 'Principalcontroller@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('app')->group(function(){

    Route::get('/home', 'HomeController@index')
        ->name('app.home');

    Route::get('/sair', 'LoginController@sair')
    ->name('app.sair');

    Route::get('/cliente', 'ClienteController@index')
        ->name('app.cliente');

    Route::get('/fornecedor', 'FornecedorController@index')
        ->name('app.fornecedor');

        Route::get('/fornecedor/listar', 'FornecedorController@listar')
        ->name('app.fornecedor.listar');

        Route::post('/fornecedor/listar', 'FornecedorController@listar')
        ->name('app.fornecedor.listar');

        Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')
        ->name('app.fornecedor.adicionar');

        Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')
        ->name('app.fornecedor.adicionar');

        Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')
        ->name('app.fornecedor.editar');

        Route::get('/fornecedor/excluir/{id}/{msg?}', 'FornecedorController@excluir')
        ->name('app.fornecedor.excluir');

    //Produtos
    Route::resource('produto', 'ProdutoController');

    Route::resource('produto-detalhe', 'ProdutoDetalheController');

});
