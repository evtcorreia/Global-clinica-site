<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



    class PessoaController extends Controller
    {
        public function  index($cpf)
        {

           

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
            $pessoas = json_decode($response->getBody(), true);

            
        return view('/paciente/index/index',[
                'pessoa' => $pessoas,
                
                
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


        public function store(Request $request)
        {   
            $senha = Hash::make($request->senha);

          
            
            $client = new \GuzzleHttp\Client();


            
            $response = $client->request('POST', 'http://api.hml01.com.br/api/pessoa/cadastrar', [

            'form_params' => [
            'pessoa_nome' => $request->nome,
            'pessoa_sobrenome' => $request->sobrenome,
            'pessoa_cpf' => $request->cpf,
            'pessoa_rg' => $request->rg,
            'pessoa_login' => $request->cpf,
            'pessoa_mail' => $request->email,
            'pessoa_senha' => $senha,
            'enderecos_endereco_id' => 1
            ]
            ]);



        }


        public function nome(Request $request)
        {
            
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://api.hml01.com.br/api/pessoa/nome/' . $request->nome);

            $pessoas = json_decode($response->getBody(), true);

            return view('/secretaria/busca-paciente/index',[
                'pessoas' => $pessoas
            ]);

            
        }


        public function formulario()
        {
            return view('/formularios/cadastro/paciente');
        }
    }

    