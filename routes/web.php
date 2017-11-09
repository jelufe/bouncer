<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/papeis', 'PapelController@index')->name('papeis');

Route::any('/papel/{id}', 'PapelController@view')->name('papel');

Route::any('/add/regra/{id}', 'PapelController@viewaddregra')->name('viewaddregra');

Route::any('regra/salvar', 'PapelController@salvar_regra')->name('salvarregra');

Route::any('regra/remover/{nome}', 'PapelController@remover_regra')->name('removerregra');

Route::any('/add/papel', 'PapelController@viewaddpapel')->name('viewaddpapel');

Route::any('/salvar/papel', 'PapelController@salvar_papel')->name('salvarpapel');

Route::any('/papeisdousuario/{id}', 'PapelController@papeisdousuario')->name('papeisdousuario');

Route::any('/adicionarpapel/{nome}', 'PapelController@adicionar_papel')->name('adicionarpapel');

Route::any('/removerpapel/{nome}', 'PapelController@remover_papel')->name('removerpapel');

