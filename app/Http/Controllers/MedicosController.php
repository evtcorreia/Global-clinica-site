<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        
        $client =  new Client();
        $response = $client->get('http://api.hml01.com.br/api/pessoa/medico/'. $cpf);
        $pessoas = json_decode($response->getBody(), true);

        session()->forget('tipo');
        session()->put('tipo', 1);
            
            
        return view('/medico/index/index',[
            'pessoa' => $pessoas        
                
        ]);
    }

    public function  consulta($cpf)
    {
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/consultas/medico/'. $cpf);
        $consulta = json_decode($response->getBody(),true);
        

        return view('/medico/consultas/index',[
           'consultas' => $consulta,
           'tipoPessoa' => 1
                    
                    
        ]);
    
    }
    
    public function store(Request $request)
    {   
        $senha = Hash::make($request->senha);


        
        $client = new \GuzzleHttp\Client();


        
        $response = $client->request('POST', 'http://api.hml01.com.br/api/medico/cadastrar', [

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

                'clinico_prof_doc' => $request->crm,
                'especialidade_id' => $request->especialidade,
                'clinica_id' => $request->clinica,
                'tipo_documento_tipo_id' => $request->doc_prof,
                //"pessoa_pessoa_cpf" => $request->pessoa_cpf,
                //"pessoa_pessoa_cod" => $idPessoas

                "tipoDoc" => $request->tipoDoc

    
        ]
        ]);

        return view('/adm/criar/confirma_clinica');

    }

}