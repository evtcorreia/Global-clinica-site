<?php


    namespace App\Http\Controllers;

    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Response;

    class AgendamentoController extends Controller
    {
        public function agendamento()
        {
            

            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/estados/');
            $estados = json_decode($response->getBody(),true);
    
            return view('/paciente/agendamentos/index',[
                'estados'=> $estados            
            ]);
        }

        public function cidades($id)
        {

            
            
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/cidades/'.$id);
            $cidade = json_decode($response->getBody(),true);
            //$cidade = json_encode($response);
    
            return ($cidade);
        }


    }
