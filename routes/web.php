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

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobrenos', 'sobrenosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'contatoController@contato')->name('site.contato');
Route::get('/login', 'loginController@login')->name('site.login');

Route::prefix('/app')->group(function(){ 
    Route::get('/clientes', 'clienteController@cliente');
    Route::get('/fornecedores', 'fornecedorController@fornecedor');
    Route::get('/produtos', 'produtoController@produto');
});
Route::get('/contato/{nome}/{a?}', function($nome, $a = null){
    if(isset($nome) and $a == null){
        echo 'Estamos aqui: '.$nome;
    }else if(isset($nome) && isset($a)){
        echo 'Estamos aqui: '.$nome.' e o '.$a;
    }
})->where('a','[0-9]+')->where('nome', '[a-zA-Z]+');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique Aqui</a>';
});

Route::get ('/teste/{p1}/{p2}', 'testeController@teste')->name('site.teste');