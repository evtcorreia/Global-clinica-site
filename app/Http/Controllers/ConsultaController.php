<?php 
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ConsultaController extends Controller
{

    
    
    public function consulta($cpf)
    {
    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
    $pessoas = json_decode($response->getBody(),true);

    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/prontuario/'.$cpf);
    $consultas = json_decode($response->getBody(),true);
    
    
    return view('/paciente/consultas/index',[
        'pessoa' => $pessoas, 
        'consultas' => $consultas,
    ]);
        
        //$client = new Client();
       // $response = $client->get('http://api.hml01.com.br/api/prontuario/'.$cpf);
        //$consultas = json_decode($response->getBody(),true);
    
        //return view('/paciente/consultas/index',[
        //'consultas' => $consultas,
       // ]);
    }

 

    public function descricao($id, $cpf)
    {
        
        
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/prontuario/'. $cpf);
        $consulta = json_decode($response->getBody(),true);
        

        

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/receita/'.$id);
        $receitas = json_decode($response->getBody(),true);

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/exame/2'.$id);
        $exames = json_decode($response->getBody(),true);


        return view('/paciente/consultas/descricao',[
            'consultas' => $consulta,
            'receitas' => $receitas, 
            'exames' => $exames,
        
        ]);
    }
}