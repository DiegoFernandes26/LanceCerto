<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Password reset link request routes...


Route::get('forgot', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('forgot', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@postEmail']);
// Password reset routes...


Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


//grupo de rotas admin
Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::group(['middleware'=>'auth.nivel:1'], function(){
        // Registration routes...
        Route::get('register', ['as' => 'register', 'uses' => 'UserAdminController@getRegister']);
        Route::post('register', ['as' => 'register.user', 'uses' => 'UserAdminController@postRegister']);
        //rotas edicao
        Route::group(['prefix' => 'edicao'], function () {
            Route::get('', ['as' => 'painel.admin.edicao', 'uses' => 'EdicaoAdminController@index']);

            //rota para exibir edição e seus detalhes
            Route::get('show/{id}', ['as' => 'painel.admin.edicao.show', 'uses' => 'EdicaoAdminController@show']);
            Route::get('create', ['as' => 'painel.admin.edicao.create', 'uses' => 'EdicaoAdminController@create']);
            Route::post('store', ['as' => 'painel.admin.edicao.store', 'uses' => 'EdicaoAdminController@store']);
            Route::get('edit/{id}', ['as' => 'painel.admin.edicao.edit', 'uses' => 'EdicaoAdminController@edit']);
            Route::put('update/{id}', ['as' => 'painel.admin.edicao.update', 'uses' => 'EdicaoAdminController@update']);
            Route::get('destroy/{id}', ['as' => 'painel.admin.edicao.destroy', 'uses' => 'EdicaoAdminController@destroy']);
        });

        //rotas premio
        Route::group(['prefix' => 'premios'], function () {
            Route::get('create/{id}', ['as' => 'admin.premio.create', 'uses' => 'PremioAdminController@create']);
            Route::post('store', ['as' => 'admin.premio.store', 'uses' => 'PremioAdminController@store']);
            Route::post('edit/{id}', ['as' => 'admin.premio.edit', 'uses' => 'PremioAdminController@edit']);
            Route::get('destroy/{id}', ['as' => 'admin.premio.destroy', 'uses' => 'PremioAdminController@destroy']);
        });

        //rotas apuração
        Route::group(['prefix' => 'apuracao'], function () {
            Route::get('check_ganhadores', ['as' => 'home.apuracao', 'uses' => 'ApuracaoAdminController@index']);
            Route::post('check_ganhadores', ['as' => 'home.apuracao.check', 'uses' => 'ApuracaoAdminController@buscarMenorLanceNoBanco']);
            Route::get('show', ['as' => 'home.apuracao.ganhador', 'uses' => 'ApuracaoAdminController@show']);
        });
    });

    //Route::group(['prefix'=>'admin'], function(){
    Route::get('', ['as' => 'painel.admin', 'uses' => 'AdminController@index']);


    //rotas pessoa
    Route::group(['prefix' => 'person'], function () {
        Route::get('new', ['as' => 'edicao.pessoa.create', 'uses' => 'PessoaAdminController@new']);
        Route::get('search', ['as' => 'edicao.pessoa.search', 'uses' => 'PessoaAdminController@search']);
        Route::post('store', ['as' => 'edicao.pessoa.store', 'uses' => 'PessoaAdminController@store']);
        Route::get('list/celular', ['as' => 'pessoa.list.celular', 'uses' => 'PessoaAdminController@listCelular']);
    });
    //rotas lance
    Route::group(['prefix' => 'lances'], function () {
        Route::post('store', ['as' => 'edicao.lances.store', 'uses' => 'LanceAdminController@store']);
    });
    //rotas de usuários
    Route::group(['user' => 'usuarios'], function (){
        Route::get('listar/usuarios', ['as' => 'usuarios.lists', 'uses' => 'UserAdminController@lists']);
        Route::get('editar/usuario/{id}', ['as' => 'userEdit', 'uses' => 'UserAdminController@edit']);
        Route::put('update/usuario/{id}', ['as' => 'userUpdate', 'uses' => 'UserAdminController@update']);
    });


    //});
});