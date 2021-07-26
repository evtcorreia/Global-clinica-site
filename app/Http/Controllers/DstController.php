<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DstController extends Controller
{
    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();



            $response = $client->request('POST', 'http://localhost:8000/api/prontuario/dst/store', [

            'form_params' => [
                'prontuarios_prontuario_cod' => $request->prontuario,
                'dst_desc' => $request->dst


            ]
            ]);
    }
}
