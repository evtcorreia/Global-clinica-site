<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;



    class PessoaController extends Controller
    {
        public function  index($cpf)
        {



            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            session()->forget('tipo');
            session()->put('tipo', 2);
            
        return view('/paciente/index/index',[
                'pessoa' => $pessoas,
                
                
            ]);
        }


        public function show($cpf, $tipo)
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
            $response = $client->get('http://api.hml01.com.br/api/cidade/busca/' . $endereco['cidades_cidade_id'] );
            $cidade = json_decode($response->getBody(),true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estados/');
            $estados = json_decode($response->getBody(),true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/cidades/'.$estado['id']);
            $cidadesDoEstado = json_decode($response->getBody(),true);
          
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/informa/comorbidade/'. $paciente['prontuario_cod']);
            $comorbidades = json_decode($response->getBody(),true);

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/informa/cirurgia/'. $paciente['prontuario_cod']);
            $cirurgias = json_decode($response->getBody(),true);
          
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/informa/DoencaFam/'. $paciente['prontuario_cod']);
            $DoencaFams = json_decode($response->getBody(),true);
          
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/informa/dst/'. $paciente['prontuario_cod']);
            $dsts = json_decode($response->getBody(),true);
            
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/informa/medControl/'. $paciente['prontuario_cod']);
            $medControls = json_decode($response->getBody(),true);
            
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/prontuario/informa/alergias/'. $paciente['prontuario_cod']);
            $alergias = json_decode($response->getBody(),true);


          
            



            
            

            return view('/paciente/informacoes/index',[
                'pessoa' => $pessoas,
                'paciente' => $paciente,
                'telefones' => $telefones,
                'endereco' => $endereco,
                'estado' => $estado,
                'cidade' => $cidade,
                'estados' => $estados,
                'cidadesDoEstado' => $cidadesDoEstado,
                'tipoAcesso' => $tipo,
                'comorbidades' => $comorbidades,
                'cirurgias' => $cirurgias,
                'DoencaFams' => $DoencaFams,
                'dsts' => $dsts,
                'medControls' => $medControls,
                'alergias' => $alergias


            ]);        
        }


        public function store(Request $request)
        {   
            $senha = Hash::make($request->senha);


            
            $client = new \GuzzleHttp\Client();

            try{
            
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

                "tipoDoc" => $request->tipoDoc

    
            ]
        ]);
    }catch(Exception $e){

        return view('/pessoa/cadastrar/paciente/');

        }

            return view('/formularios/cadastro/telasalva/');

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
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estados/');
            $estados = json_decode($response->getBody(),true);


            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/convenios/all');
            $planosSaude = json_decode($response->getBody(), true);

            return view('/formularios/cadastro/paciente',[
                
                'estados' => $estados,
                'planos' => $planosSaude
                
                ]);
        }


        public function alteraTelefone(Request $request)
        {
            $client = new \GuzzleHttp\Client();


            
            $response = $client->request('POST', 'http://api.hml01.com.br/api/pessoa/altera/telefone', [

            'form_params' => [

                'telefone_cod' => $request->id,
                'telefone_area' => $request->area,
                'telefone_num' => $request->telefone

        
                ]
            ]);
        }
        
    }