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

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/especialidades/');
            $especialidades = json_decode($response->getBody(), true);

            

            
        return view('/adm/criar/medico',[
            'pessoa' => $pessoas,
            'estados' => $estados,
            'especialidades' => $especialidades
                
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

        public function  listar($id)
        {



            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/buscar/funcionarios/'. $id);
            $pessoas = json_decode($response->getBody(), true);


           

            
        return view('/adm/listar/listar_func',[
                'pessoas' => $pessoas,
                //'clinicaDoAdm' => $clinicaDoAdm
                
                
            ]);
        }

        public function  listarClinicas($cpf)
        {



            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);


            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/clinicaDoAdm/'.$cpf);
            $clinicaDoAdm = json_decode($response->getBody(), true);

            
        return view('/adm/listar/listar_clinicas',[
                'pessoa' => $pessoas,
                'clinicaDoAdm' => $clinicaDoAdm
                
                
            ]);
        }


        public function funcionarioInfo($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/informacoes/funcionarios/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            return view('/adm/funcionarios/informacoes',[
                'pessoa' => $pessoas,
                //'clinicaDoAdm' => $clinicaDoAdm
                
                
            ]);
        }


        public function funcionarioDemissao(Request $request)
        {
            $client = new \GuzzleHttp\Client();


            
            $response = $client->request('POST', 'http://api.hml01.com.br/api/demissao/funcionario/data', [

            'form_params' => [

                'funcionario_dataDemissao' => $request->data,
                'pessoa_pessoa_cpf' => $request->cpf,
                

        
                ]
            ]);
        }
}