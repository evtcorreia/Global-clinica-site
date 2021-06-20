<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedControlController extends Controller
{
    public function store(Request $request)
    {

        
        $client = new \GuzzleHttp\Client();


            
            $response = $client->request('POST', 'http://api.hml01.com.br/api/prontuario/medControl/store', [

            'form_params' => [
                'prontuarios_prontuario_cod' => $request->prontuario,
                'medControl_desc' => $request->medControl

        
            ]
            ]);
    }
}