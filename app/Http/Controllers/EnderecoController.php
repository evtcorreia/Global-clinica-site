<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnderecoController extends Controller
{
    public function editaBairro(Request $request)
    {

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost:8000/api/endereco/pessoa/altera/bairro', [

        'form_params' => [

            'endereco_id' => $request->id,
            'endereco_bairro' => $request->bairro


            ]
        ]);
    }

    public function editaEstado(Request $request)
    {

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost:8000/api/endereco/pessoa/altera/estado', [

        'form_params' => [

            'endereco_id' => $request->id,
            'estados_estado_id' => $request->estado


            ]
        ]);
    }

    public function editaCidade(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost:8000/api/endereco/pessoa/altera/cidade', [

        'form_params' => [

            'endereco_id' => $request->id,
            'cidades_cidade_id' => $request->cidade


            ]
        ]);
    }

    public function editaRua(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost:8000/api/endereco/pessoa/altera/rua', [

        'form_params' => [

            'endereco_id' => $request->id,
            'endereco_logradouro' => $request->rua


            ]
        ]);
    }

    public function editaCep(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost:8000/api/endereco/pessoa/altera/cep', [

        'form_params' => [

            'endereco_id' => $request->id,
            'endereco_cep' => $request->cep


            ]
        ]);
    }
}
