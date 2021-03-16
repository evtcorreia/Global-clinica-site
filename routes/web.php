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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/paciente/index','PessoaController@index');
Route::get('/paciente/informacao','PessoaController@show');
Route::get('/paciente/consulta','ConsultaController@consulta');
Route::get('/paciente/consulta/descricao','ConsultaController@descricao');
Route::get('/paciente/agendamentos/index', 'ConsultaController@agendamento');

//Medico

Route::get('/medico/index', 'PessoaController@index');

