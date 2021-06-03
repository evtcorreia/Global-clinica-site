<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class MedicosController extends Controller
{
    public function busca($id)
    {
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/clinicas/medicos/especialidade/'. $id);
        $medicos = json_decode($response->getBody(), true);

        return $medicos;
    }
    


    public function  index($cpf)
    {
        
        $client =  new Client();
        $response = $client->get('http://api.hml01.com.br/api/pessoa/recepcao/'. $cpf);
        $pessoas = json_decode($response->getBody(), true);
            
            
        return view('/medico/index/index',[
            'pessoa' => $pessoas        
                
        ]);
    }

    public function  consulta($cpf)
    {
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/consultas/medico/'. $cpf);
        $consulta = json_decode($response->getBody(),true);
        

        return view('/medico/consultas/index',[
           'consultas' => $consulta,
                    
                    
        ]);
    
    }
}