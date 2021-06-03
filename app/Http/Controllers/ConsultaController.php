<?php 
namespace App\Http\Controllers;

use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    
    
    public function consulta($cpf)
    {
    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
    $pessoas = json_decode($response->getBody(),true);

    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/prontuario/'.$cpf);
    $consultas = json_decode($response->getBody(),true);
    
    
    return view('/paciente/consultas/index',[
        'pessoa' => $pessoas, 
        'consultas' => $consultas,
    ]);
        
        //$client = new Client();
       // $response = $client->get('http://api.hml01.com.br/api/prontuario/'.$cpf);
        //$consultas = json_decode($response->getBody(),true);
    
        //return view('/paciente/consultas/index',[
        //'consultas' => $consultas,
       // ]);
    }

 

    public function descricao($id, $cpf)
    {
        
        
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/prontuario/'. $cpf);
        $consulta = json_decode($response->getBody(),true);
        

        

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/receita/'.$id);
        $receitas = json_decode($response->getBody(),true);

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/exame/2'.$id);
        $exames = json_decode($response->getBody(),true);


        return view('/paciente/consultas/descricao',[
            'consultas' => $consulta,
            'receitas' => $receitas, 
            'exames' => $exames,
        
        ]);
    }



    public function store(Request $request)
    {       
        


            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'http://api.hml01.com.br/api/consulta', [

                
            'form_params' => [
            'consulta_data' => $request->data,
            'consulta_horario' => $request->hora,
            'prontuarios_prontuario_cod' => $request->idProntuario,
            'corpo_clinico_pessoa_pessoa_cpf' => $request->medico,
            'clinicas_id' => $request->clinica,
            ]
        ]);

        
    }

    public function show($id)
    {
        return view('medico/consultas/atendimento/forms',[
            'id' => $id
        ]);
    }
    
}