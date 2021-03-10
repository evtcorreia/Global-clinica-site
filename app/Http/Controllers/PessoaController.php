<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;



    class PessoaController extends Controller
    {
        public function  index()
        {
            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/72990385671');
            $pessoas = json_decode($response->getBody(), true);

        return view('/paciente/index/index',[
                'pessoa' => $pessoas,
                
                
            ]);
        }


        public function show()
        {
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/72990385671');
            $pessoas = json_decode($response->getBody(),true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/paciente/72990385671');
            $paciente = json_decode($response->getBody(),true);

            $client = new Client();
            $response  = $client->get('http://api.hml01.com.br/api/telefone/72990385671');
            $telefones = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/endereco/72990385671');
            $endereco = json_decode($response->getBody(),true);


            return view('/paciente/informacoes/index',[
                'pessoa' => $pessoas,
                'paciente' => $paciente,
                'telefones' => $telefones,
                'endereco' => $endereco
            ]);        
       }
    }

    