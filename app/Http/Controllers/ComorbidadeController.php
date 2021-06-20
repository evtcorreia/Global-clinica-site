<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ComorbidadeController extends Controller
{
    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();


            
            $response = $client->request('POST', 'http://api.hml01.com.br/api/comorbidade/inserir', [

            'form_params' => [
                'prontuarios_prontuario_cod' => $request->prontuario,
                'comorbidade_desc' => $request->comorbidade

        
            ]
            ]);
    }
}