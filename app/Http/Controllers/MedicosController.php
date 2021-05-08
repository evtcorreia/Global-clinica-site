<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class MedicosController extends Controller
{
    public function busca($id)
    {
        $client = new Client();
        $response = $client->get('http://api.hml01.com.br/api/clinicas/medicos/especialidade/'. $id);
        $medicos = json_decode($response->getBody(), true);

        return $medicos;
    }
    

}