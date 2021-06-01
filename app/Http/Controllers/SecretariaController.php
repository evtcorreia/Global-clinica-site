<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;



    class SecretariaController extends Controller
    {
        public function  index($cpf)
        {
            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/recepcao/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);
            
            
        return view('/secretaria/index/index',[
                'pessoa' => $pessoas
                
                
                
            ]);
        }


            public function  consulta($id)
            {
                //$client =  new Client();
                //$response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
               // $pessoas = json_decode($response->getBody(), true);
                
                $client = new Client();
                $response = $client->get('http://api.hml01.com.br/api/consultas/clinica/'. $id);
                $consulta = json_decode($response->getBody(),true);
                
            return view('/secretaria/consultas/index',[
                    
                    'consultas' => $consulta,
                    
                    
                ]);
    
            }


        public function show($cpf)
        {
            $endereco = '';

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
            $pessoas = json_decode($response->getBody(),true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/paciente/'.$cpf);
            $paciente = json_decode($response->getBody(),true);

            $client = new Client();
            $response  = $client->get('http://api.hml01.com.br/api/telefone/'.$cpf);
            $telefones = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/endereco/'. $cpf);
            $endereco = json_decode($response->getBody(),true);

            
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estado/busca/' . $endereco['endereco_id'] );
            $estado = json_decode($response->getBody(),true);


            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/cidade/busca/' . $endereco['endereco_id'] );
            $cidade = json_decode($response->getBody(),true);



            return view('/paciente/informacoes/index',[
                'pessoa' => $pessoas,
                'paciente' => $paciente,
                'telefones' => $telefones,
                'endereco' => $endereco,
                'estado' => $estado,
                'cidade' => $cidade
            ]);        
        }
    }

    