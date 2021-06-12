<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



    class AdmController extends Controller
    {
        public function  index($cpf)
        {



            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $cpf);
            $pessoas = json_decode($response->getBody(), true);

            
        return view('/adm/index/index',[
                'pessoa' => $pessoas,
                
                
            ]);
        }
}