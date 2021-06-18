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

            return view('/agendamentos/index/agradecimento');


        
    }

    public function show($id)
    {
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/medicamentos/all');
        $medicamentos = json_decode($response->getBody(),true);

        return view('medico/consultas/atendimento/forms',[
            'id' => $id,
            'medicamentos' => $medicamentos
        ]);
    }
    public function gravarDadosConsulta(Request $request)
    {

        $listaRemedios = [];

        //dd($request->remedio);
    //$listaRemedios =  array_chunk($request->remedio, 4);
    

        $json_array = json_encode($request->remedio);
        
        //$json_array = json_encode($request->remedio);

        //foreach($request->remedio as $array)
        //{
        //    array_push($listaRemedios, $array);
            //var_dump($listaRemedios);
       // }

       //dd($listaRemedios);

       // $keys = array('Remedio', 'Posologia', 'quantidade', 'tipo');
            //foreach($listaRemedios as  &$array) {
                //$array = (object) array_combine($keys, $array);
            //} 

            //$json_array = json_encode($array)  ;

        //var_dump($json_array);
        //exit();
        
       // exit();
        

        //$t = substr($json_array, 1);
        //var_dump($request->remedio);
        //exit();


        

        //dd(substr ( $json_array , 0 , -1 ));
        //var_dump($request->remedio);
        //var_dump($request->remedio);
        

        
        //exit();

        $data = date('Y-m-d');
        

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST','http://api.hml01.com.br/api/consulta/grava/informacoes', [

            'form_params' => [
                'consulta_info' => $request->sintomas,
                'consulta_laudo' =>$request->laudoConsulta,
                'consulta_obs' => $request->obsConsulta,
                'consulta_id' => $request->idConsulta,  
                'exame_data' => $request->dataExame,
                'exame_resultado' => $request->laudoExame,
                'consultas_consulta_id' => $request->idConsulta,
                'receita_data' => $data,
                'receita_descricao' => $request->descricaoReceita,
                'consultas_consulta_id'  => $request->idConsulta,
                'medicamento' => $request->remedio

            ]


        ]);

    }

    public function alteraHora(Request $request)
    {
        

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://api.hml01.com.br/api/consulta/alteraHora',[

            'form_params' =>[

                'consulta_horario' => $request->hora,
                'consulta_id' => $request->id

                
            ]
        ]);


        
    }
    public function alteraStatus(Request $request)
    {

    

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://api.hml01.com.br/api/consulta/alteraStatus',[

            'form_params' =>[

                'consulta_status' => $request->status,
                'consulta_id' => $request->id

                
            ]
        ]);


        
    }
    
    public function alteraData(Request $request)
    {

    

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://api.hml01.com.br/api/consulta/alteraData',[

            'form_params' =>[

                'consulta_data' => $request->data,
                'consulta_id' => $request->id

                
            ]
        ]);


        
    }

    public function consultaDoPaciente($cpf)
    {
    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/pessoa/'.$cpf);
    $pessoas = json_decode($response->getBody(),true);

    $client = new Client();
    $response = $client->get('http://api.hml01.com.br/api/prontuario/'.$cpf);
    $consultas = json_decode($response->getBody(),true);
    
    
    return view('/secretaria/busca-paciente/listadeconsultas',[
        'pessoa' => $pessoas, 
        'consultas' => $consultas,
    ]);
    
    }

    public function deletaConsulta(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://api.hml01.com.br/api/consulta/deleta', [

            'form_params'=>[
                'consulta_id' => $request->id,
                'consulta_D_E_L_E_T_' => "*"
            ]
        ]);
    }
}

