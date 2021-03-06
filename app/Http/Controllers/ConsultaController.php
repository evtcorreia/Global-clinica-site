<?php
namespace App\Http\Controllers;
use Exception;
use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function consulta($cpf)
    {
    $client = new Client();
    $response = $client->get('http://localhost:8000/api/pessoa/'.$cpf);
    $pessoas = json_decode($response->getBody(),true);

    $client = new Client();
    $response = $client->get('http://localhost:8000/api/prontuario/'.$cpf);
    $consultas = json_decode($response->getBody(),true);


    return view('/paciente/consultas/index',[
        'pessoa' => $pessoas,
        'consultas' => $consultas,
    ]);

        //$client = new Client();
       // $response = $client->get('http://localhost:8000/api/prontuario/'.$cpf);
        //$consultas = json_decode($response->getBody(),true);

        //return view('/paciente/consultas/index',[
        //'consultas' => $consultas,
       // ]);
    }



    public function descricao($id, $cpf)
    {


        $client = new Client();
        $response = $client->get('http://localhost:8000/api/prontuario/'. $cpf);
        $consulta = json_decode($response->getBody(),true);




        $client = new Client();
        $response = $client->get('http://localhost:8000/api/receita/'.$id);
        $receitas = json_decode($response->getBody(),true);

        $client = new Client();
        $response = $client->get('http://localhost:8000/api/exame/2'.$id);
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
            try{
            $response = $client->request('POST', 'http://localhost:8000/api/consulta', [


            'form_params' => [
            'consulta_data' => $request->data,
            'consulta_horario' => $request->hora,
            'prontuarios_prontuario_cod' => $request->idProntuario,
            'corpo_clinico_pessoa_pessoa_cpf' => $request->medico,
            'clinicas_id' => $request->clinica,
            ]
        ]);
    }catch(Exception $e){

        return redirect()->back()->with('erro','Exsistem campos n??o preenchidos! ');
    }



            return redirect()->back()->with('status','Consulta marcada, aguarde confirma????o! ');
            //return view('/agendamentos/index/agradecimento');



    }

    public function show($id)
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/medicamentos/all');
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
        $response = $client->request('POST','http://localhost:8000/api/consulta/grava/informacoes', [

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
                'medicamento' => $request->remedio,
                'consulta_status_status_id' => '5'

            ]


        ]);





        return view('/medico/consultas/atendimento/telasalva');

    }

    public function alteraHora(Request $request)
    {


        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/api/consulta/alteraHora',[

            'form_params' =>[

                'consulta_horario' => $request->hora,
                'consulta_id' => $request->id


            ]
        ]);



    }
    public function alteraStatus(Request $request)
    {



        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/api/consulta/alteraStatus',[

            'form_params' =>[

                'consulta_status' => $request->status,
                'consulta_id' => $request->id


            ]
        ]);



    }

    public function alteraData(Request $request)
    {



        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/api/consulta/alteraData',[

            'form_params' =>[

                'consulta_data' => $request->data,
                'consulta_id' => $request->id


            ]
        ]);



    }

    public function consultaDoPaciente($cpf)
    {
    $client = new Client();
    $response = $client->get('http://localhost:8000/api/pessoa/'.$cpf);
    $pessoas = json_decode($response->getBody(),true);

    $client = new Client();
    $response = $client->get('http://localhost:8000/api/prontuario/'.$cpf);
    $consultas = json_decode($response->getBody(),true);


    return view('/secretaria/busca-paciente/listadeconsultas',[
        'pessoa' => $pessoas,
        'consultas' => $consultas,
    ]);

    }

    public function deletaConsulta(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/api/consulta/deleta', [

            'form_params'=>[
                'consulta_id' => $request->id,
                'consulta_D_E_L_E_T_' => "*"
            ]
        ]);

        return redirect('/paciente/consultas/' . $request->ddd)->with('error','Consulta excluida com sucesso!!! ');
    }



    public function consultaReceita($id)
    {


            $client = new Client();
            $response = $client->get('http://localhost:8000/api/consulta/consulta/'. $id);
            $consultas = json_decode($response->getBody(),true);

            
        return view('receitas/index',[

            'consultas' => $consultas

        ]);
    }
}

