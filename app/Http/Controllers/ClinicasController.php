<?php

    namespace App\Http\Controllers;

    use GuzzleHttp\Client;

    class ClinicasController extends Controller
    {

        public function busca($id)
        {
            $client = new Client();
            $response = $client->get('http://api.hml01.com.br/api/clinicas/cidade/'. $id);
            $clinicas = json_decode($response->getBody(), true);


            return $clinicas;
        }
    }