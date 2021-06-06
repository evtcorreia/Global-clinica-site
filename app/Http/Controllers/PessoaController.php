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
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
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
                    'pessoa_pai' => $request->pai,
                    'pessoa_mae' => $request->mae,
                    'pessoa_mail' => $request->email,
                    'pessoa_login' => $request->cpf,
                    'pessoa_senha' => $senha,
                    //'pessoa_endereco' => $idEndereco
                    'enderecos_endereco_id' => 1,
                   

                
                    'endereco_logradouro' => $request->logradouro, 
                    'endereco_bairro' => $request->bairro,
                    'endereco_numero' => $request->numero,
                    'endereco_complemento' => $request->complemento,
                    'endereco_cep' => $request->cep,
                    'endereco_pais' => $request->pais,
                    'cidades_cidade_id' => $request->cidade,
                    'estados_estado_id' => $request->estado,
                    

                //'pessoa_pessoa_cod' => $idPessoas,
                //'tipo_pessoa_tpessoa_cod' => $request->tpessoa,
                    'tpessoa' => $request->tpessoa,

                    'telefone_area' => $request->area,
                    'telefone_num' => $request->telefone,
                //'pessoa_pessoa_cod' => $idPessoas,
                    'pessoa_pessoa_cpf' => $request->cpf,
                
                   // "pessoa_pessoa_cpf" => $request->pessoa_cpf,
                    "paciente_sus_nr" => $request->sus_nr,
                    "paciente_tipo_sang" => $request->tipoSang,
                    "paciente_fator_rh" => $request->fatorRh,
                    //"pessoa_pessoa_cod" => $idPessoas

           
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

    