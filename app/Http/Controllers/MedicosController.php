<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;

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
        $response = $client->get('http://api.hml01.com.br/api/pessoa/recepcao/'. $cpf);
        $pessoas = json_decode($response->getBody(), true);
            
            
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

        return view('/formularios/cadastro/telasalva');

    }

}