<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



    class SecretariaController extends Controller
    {
        public function  index($cpf)
        {
            $client =  new Client();
            $response = $client->get('http://localhost:8000/api/pessoa/recepcao/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            session()->forget('tipo');
            session()->put('tipo', 3);

        return view('/secretaria/index/index',[
                'pessoa' => $pessoas



            ]);
        }


            public function  consulta($id)
            {
                //$client =  new Client();
                //$response = $client->get('http://localhost:8000/api/pessoa/'.$cpf);
               // $pessoas = json_decode($response->getBody(), true);

                $client = new Client();
                $response = $client->get('http://localhost:8000/api/secretaria/consultas/clinica/'. $id);
                $consulta = json_decode($response->getBody(),true);

            return view('/secretaria/consultas/index',[

                    'consultas' => $consulta,


                ]);

            }


        public function show($cpf)
        {
            $endereco = '';

            $client = new Client();
            $response = $client->get('http://localhost:8000/api/pessoa/'.$cpf);
            $pessoas = json_decode($response->getBody(),true);

            $client = new Client();
            $response = $client->get('http://localhost:8000/api/paciente/'.$cpf);
            $paciente = json_decode($response->getBody(),true);

            $client = new Client();
            $response  = $client->get('http://localhost:8000/api/telefone/'.$cpf);
            $telefones = json_decode($response->getBody(), true);

            $client = new Client();
            $response = $client->get('http://localhost:8000/api/endereco/'. $cpf);
            $endereco = json_decode($response->getBody(),true);


            $client = new Client();
            $response = $client->get('http://localhost:8000/api/estado/busca/' . $endereco['endereco_id'] );
            $estado = json_decode($response->getBody(),true);


            $client = new Client();
            $response = $client->get('http://localhost:8000/api/cidade/busca/' . $endereco['endereco_id'] );
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



        $response = $client->request('POST', 'http://localhost:8000/api/funcionario/cadastrar', [

        'form_params' => [
            //dados pessoais
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

                'clinica_id' => $request->clinica,
                'funcionario_horarioTrabalho' => $request->horario,
                'funcionario_dataAdmissao' => $request->admissao,


                "tipoDoc" => $request->tipoDoc


        ]
        ]);

        return view('/adm/criar/confirma_clinica');

    }

}

