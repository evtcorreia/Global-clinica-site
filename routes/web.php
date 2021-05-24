<?php

use Illuminate\Support\Facades\Auth;
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
    return view('/entrar/index');
});

Auth::routes();

Route::get('/paciente/index/{cpf}','PessoaController@index');
Route::get('/paciente/informacao/{cpf}','PessoaController@show');
Route::get('/paciente/consultas/{cpf}','ConsultaController@consulta');
Route::get('/paciente/consulta/descricao/{id}/{cpf}','ConsultaController@descricao');
Route::get('/paciente/agendamentos/index/{id}', 'AgendamentoController@agendamento');
Route::get('/get-cidades/{id}', 'AgendamentoController@cidades');
Route::get('/get-clinicas/{id}', 'ClinicasController@busca');
Route::get('/get-especialidades/{id}', 'EspecialidadesController@busca');
Route::get('/get-medicos/{id}', 'MedicosController@busca');

Route::Post('/consulta/salvar', 'ConsultaController@store');

//Medico

Route::get('/medico/index', 'PessoaController@index');


//Secretaria

Route::get('/secretaria/index/{cpf}','SecretariaController@index');
Route::get('/secretaria/consultas/index/{cpf}','SecretariaController@consulta');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entrar','EntrarController@index');
Route::post('/verifica-login','EntrarController@verificaLogin');
Route::get('/sair', 'SairController@logout');


