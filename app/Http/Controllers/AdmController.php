<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



    class AdmController extends Controller
    {
        public function  index($cpf)
        {



            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            
        return view('/adm/index/index',[
                'pessoa' => $pessoas,
                
                
            ]);
        }

        public function  clinica($cpf)
        {
            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estados/');
            $estados = json_decode($response->getBody(),true);
            
        return view('/adm/criar/clinica',[
            'pessoa' => $pessoas,
            'estados' => $estados,
                
                
            ]);
        }

        public function  medico($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estados/');
            $estados = json_decode($response->getBody(),true);

            
        return view('/adm/criar/medico',[
            'pessoa' => $pessoas,
            'estados' => $estados,
                
            ]);
        }

        public function  recep($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estados/');
            $estados = json_decode($response->getBody(),true);

            
        return view('/adm/criar/recep',[
            'pessoa' => $pessoas,
            'estados' => $estados,
                
            ]);
        }

        public function  relatorio($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            
        return view('/adm/criar/relatorio',[
            'pessoa' => $pessoas,

                
            ]);
        }
}