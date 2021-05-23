<?php

namespace App\Http\Controllers;



class SairController extends Controller
{
    public function logout()
    {
        session()->flush();

        return redirect('/entrar');
    }
    
}