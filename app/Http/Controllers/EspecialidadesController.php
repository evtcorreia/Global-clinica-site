<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class EspecialidadesController extends Controller
{
    public function busca($id){

        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/clinicas/especialidades/'.$id);
        $especialidades = json_decode($response->getBody(), true);

        return $especialidades;
    }
} 