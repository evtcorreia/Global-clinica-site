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

Route::post('/pessoa/cadastrar', 'PessoaController@store')
->middleware('autenticador');

Route::get('/pessoa/cadastrar/paciente', 'PessoaController@formulario')
->middleware('autenticador');


Route::get('/paciente/index/{cpf}','PessoaController@index')
->middleware('autenticador');

Route::get('/paciente/informacao/{cpf}','PessoaController@show')
->middleware('autenticador');

Route::get('/paciente/consultas/{cpf}','ConsultaController@consulta')
->middleware('autenticador');

Route::get('/paciente/consulta/descricao/{id}/{cpf}','ConsultaController@descricao')
->middleware('autenticador');

Route::get('/agendamentos/index/{id}', 'AgendamentoController@agendamento')
->middleware('autenticador');

Route::get('/get-cidades/{id}', 'AgendamentoController@cidades')
->middleware('autenticador');

Route::get('/get-clinicas/{id}', 'ClinicasController@busca')
->middleware('autenticador');

Route::get('/get-especialidades/{id}', 'EspecialidadesController@busca')
->middleware('autenticador');

Route::get('/get-medicos/{id}', 'MedicosController@busca')
->middleware('autenticador');

Route::Post('/consulta/salvar', 'ConsultaController@store')
->middleware('autenticador');

//Medico

Route::get('/medico/index/{cpf}', 'MedicosController@index');
//->middleware('autenticador');

Route::get('/medico/consultas/index/{cpf}','MedicosController@consulta');
//->middleware('autenticador');

Route::get('/medico/consulta/atendimento/{id}', 'ConsultaController@show');
//->middleware('autenticador');

Route::post('/salvar/detalhes/consultas', 'consultaController@gravarDadosConsulta');


//Secretaria

Route::get('/secretaria/index/{cpf}','SecretariaController@index')
->middleware('autenticador');

Route::get('/secretaria/consultas/index/{cpf}','SecretariaController@consulta')
->middleware('autenticador');

Route::get('/busca/paciente','BuscaController@index')
->middleware('autenticador');

Route::post('/get-paciente', 'PessoaController@nome')
->middleware('autenticador');


Route::get('/secretaria/busca-paciente/listadeconsultas/{cpf}','ConsultaController@consultaDoPaciente')
->middleware('autenticador');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')
->middleware('autenticador');

Route::get('/entrar','EntrarController@index');


Route::post('/verifica-login','EntrarController@verificaLogin');


Route::get('/tipo-login/{cpf}', 'EntrarController@tipoLogin')
->middleware('autenticador');

Route::get('/sair', 'SairController@logout')
->middleware('autenticador');

//update

Route::post('/editaHora','ConsultaController@alteraHora');
Route::post('/editaStatus','ConsultaController@alteraStatus');
Route::post('/editaData','ConsultaController@alteraData');
Route::post('/editaTelefone','PessoaController@alteraTelefone');
Route::post('/editaBairro','EnderecoController@editaBairro');
Route::post('/editaEstado','EnderecoController@editaEstado');
Route::post('/editaCidade','EnderecoController@editaCidade');
Route::post('/editaRua','EnderecoController@editaRua');
Route::post('/editaCep','EnderecoController@editaCep');

//delete

Route::post('/deletaConsulta', 'ConsultaController@deletaConsulta');

//Adm

Route::get('/adm/index/{cpf}','AdmController@index');
Route::get('/adm/criar/clinica/{cpf}','AdmController@clinica');
Route::post('/clinica/cadastrar', 'ClinicasController@store');
Route::get('/adm/criar/medico/{cpf}','AdmController@medico');
Route::get('/adm/criar/recep/{cpf}','AdmController@recep');
Route::get('/adm/criar/relatorio/{cpf}','AdmController@relatorio');
// ->middleware('autenticador');