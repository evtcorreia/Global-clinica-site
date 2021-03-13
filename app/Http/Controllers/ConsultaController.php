<?php 
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ConsultaController extends Controller
{
    
    public function consulta()
    {
    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/pessoa/72990385671');
    $pessoas = json_decode($response->getBody(),true);

     $client = new Client();
     $response = $client->get('http://api.hml01.com.br/api/prontuario/72990385671');
     $consultas = json_decode($response->getBody(),true);
     
    
     return view('/paciente/consultas/index',[
        'pessoa' => $pessoas, 
        'consultas' => $consultas,
     ]);
    }

    public function descricao()
    {
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/prontuario/72990385671');
        $consulta = json_decode($response->getBody(),true);

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/receita/2');
        $receitas = json_decode($response->getBody(),true);

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/exame/2');
        $exames = json_decode($response->getBody(),true);

        return view('/paciente/consultas/descricao',[
            'consulta' => $consulta,
            'receitas' => $receitas, 
            'exames' => $exames,
           
         ]);
    }
}