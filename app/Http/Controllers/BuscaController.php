<?php

    namespace App\Http\Controllers;

    class BuscaController extends Controller
    {
        public function index()
        {
            return view('/secretaria/busca-paciente/index');
        }
    }