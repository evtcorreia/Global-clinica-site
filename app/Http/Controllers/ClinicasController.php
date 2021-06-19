<?php

    namespace App\Http\Controllers;

    use GuzzleHttp\Client;

    class ClinicasController extends Controller
    {

        public function busca($id)
        {
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/clinicas/cidade/'. $id);
            $clinicas = json_decode($response->getBody(), true);


            return $clinicas;
        }

        public function store(Request $request)
        {   
            $senha = Hash::make($request->senha);


            
            $client = new \GuzzleHttp\Client();


            
            $response = $client->request('POST', 'http://api.hml01.com.br/api/clinica/cadastrar', [

            'form_params' => [
                    'clinica_nome' => $request->nome,
                    'clinica_cnpj' => $request->cnpj,
                    'clinica_mail' => $request->email,
                    //'clinica_login' => $request->cpf,
                    //'clinica_senha' => $senha,
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
                    // 'tpessoa' => $request->tpessoa,

                    'telefone_area' => $request->area,
                    'telefone_num' => $request->telefone,
                

                    "tipoDoc" => $request->tipoDoc

        
            ]
            ]);

            return view('/adm/criar/comfirma_clinica');

    }
} 