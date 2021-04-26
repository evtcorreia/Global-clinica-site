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



Route::get('/paciente/index/{cpf}','PessoaController@index');
Route::get('/paciente/informacao/{cpf}','PessoaController@show');
Route::get('/paciente/consultas/{cpf}','ConsultaController@consulta');
Route::get('/paciente/consulta/descricao/{id}/{cpf}','ConsultaController@descricao');
Route::get('/paciente/agendamentos/index', 'AgendamentoController@agendamento');
Route::get('/get-cidades/{id}', 'AgendamentoController@cidades');
Route::get('/get-clinicas/{id}', 'ClinicasController@busca');


//Medico

Route::get('/medico/index', 'PessoaController@index');

