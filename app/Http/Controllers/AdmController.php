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
            $response = $client->get('http://localhost:8000/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            session()->forget('tipo');
            session()->put('tipo', 4);


        return view('/adm/index/index',[
                'pessoa' => $pessoas,


            ]);
        }

        public function  clinica($cpf)
        {
            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://localhost:8000/api/estados/');
            $estados = json_decode($response->getBody(),true);

        return view('/adm/criar/clinica',[
            'pessoa' => $pessoas,
            'estados' => $estados,


            ]);
        }

        public function  medico($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://localhost:8000/api/estados/');
            $estados = json_decode($response->getBody(),true);

            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/especialidades/');
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
            $response = $client->get('http://localhost:8000/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://localhost:8000/api/estados/');
            $estados = json_decode($response->getBody(),true);


        return view('/adm/criar/recep',[
            'pessoa' => $pessoas,
            'estados' => $estados,

            ]);
        }

        public function  relatorio($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);


        return view('/adm/criar/relatorio',[
            'pessoa' => $pessoas,


            ]);
        }

        public function  listar($id)
        {



            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/buscar/funcionarios/'. $id);
            $pessoas = json_decode($response->getBody(), true);





        return view('/adm/listar/listar_func',[
                'pessoas' => $pessoas,
                //'clinicaDoAdm' => $clinicaDoAdm


            ]);
        }

        public function  listarClinicas($cpf)
        {



            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);


            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/clinicaDoAdm/'.$cpf);
            $clinicaDoAdm = json_decode($response->getBody(), true);


        return view('/adm/listar/listar_clinicas',[
                'pessoa' => $pessoas,
                'clinicaDoAdm' => $clinicaDoAdm


            ]);
        }


        public function funcionarioInfo($cpf)
        {

            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/informacoes/funcionarios/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            return view('/adm/funcionarios/informacoes',[
                'pessoa' => $pessoas,
                //'clinicaDoAdm' => $clinicaDoAdm


            ]);
        }


        public function funcionarioDemissao(Request $request)
        {
            $client = new \GuzzleHttp\Client();



            $response = $client->request('POST', 'http://localhost:8000/api/demissao/funcionario/data', [

            'form_params' => [

                'funcionario_dataDemissao' => $request->data,
                'pessoa_pessoa_cpf' => $request->cpf,



                ]
            ]);
        }

        public function relatorioAtendimento(Request $request)
        {


            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/adm/relatorios/consulta/dia/'. $request->dataIni .'/'. $request->dataFim);
            $consultas = json_decode($response->getBody(), true);

            return view('/adm/relatorios/consultas',[
                'consultas' => $consultas,
                //'clinicaDoAdm' => $clinicaDoAdm


            ]);
        }

        public function QuemSomos(){

            return view('/adm/quemSomos',[



            ]);

        }



}
