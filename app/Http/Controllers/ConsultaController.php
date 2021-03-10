<?php 
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ConsultaController extends Controller
{
    
    public function consulta()
    {
     $client = new Client();
     $response = $client->get('http://api.hml01.com.br/api/prontuario/72990385671');
     $consultas = json_decode($response->getBody(),true);
     var_dump($consultas);
     exit();
    
     return view('/paciente/consultas/index',[
         'consultas' => $consultas,
     ]);
    }
}