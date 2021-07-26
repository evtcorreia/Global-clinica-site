<?php


    namespace App\Http\Controllers;

    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Response;

    class AgendamentoController extends Controller
    {
        public function agendamento($id)
        {


            $client = new Client();
            $response = $client->get('http://localhost:8000/api/estados/');
            $estados = json_decode($response->getBody(),true);

            return view('/agendamentos/index/index',[
                'estados'=> $estados,
                'idProntuario'=> $id ,
            ]);
        }

        public function cidades($id)
        {



            $client = new Client();
            $response = $client->get('http://localhost:8000/api/cidades/'.$id);
            $cidade = json_decode($response->getBody(),true);
            //$cidade = json_encode($response);

            return ($cidade);
        }


    }
