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

            //if(!session()->has('user')){
                //return redirect('/entrar');
            //}

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
            $pessoas = json_decode($response->getBody(), true);

            
        return view('/medico/index/index',[
                'pessoa' => $pessoas,
                
                
            ]);
        }

    public function  consulta($cpf)
        {
            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
            $pessoas = json_decode($response->getBody(), true);
            
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/'. $cpf);
            $consulta = json_decode($response->getBody(),true);
            
        return view('/medico/consultas/index',[
                'pessoa' => $pessoas,
                'consultas' => $consulta,
                
                
            ]);

        }

}