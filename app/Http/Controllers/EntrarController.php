<?php

namespace App\Http\Controllers;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class EntrarController extends Controller
{
    public function index()
    {
        return view('/entrar/index');
    }

    public function verificaLogin(Request $request)
    {
        //echo $request->cpf;

            
            $result="";
        try{

            $client =  new Client();
            $response = $client->get('http://api.hml01.com.br/api/pessoa/'. $request->cpf);
            $pessoas = json_decode($response->getBody(), true);

        }catch(Exception $e){

            session()->flash('erro', 'usuario ou senha errados');
            return redirect('/entrar');

        }
           

           
            //$verifica  = Hash::check($request->cpf, $pessoas['pessoa_senha']);

            //var_dump($verifica);
            //exit();


            try {

                if($request->cpf == $pessoas['pessoa_cpf'] and $request->password == $pessoas['pessoa_senha'])
                    {
                        session()->put('user', $pessoas['pessoa_cpf']  );
                        //return redirect('/paciente/index/'. $pessoas['pessoa_cpf']);

                        if($request->tipo == 4 and $pessoas['pessoa_tipo'])
                        {
                            return redirect('/admin/glc-admin'.'/'.$pessoas['pessoa_cpf'] );
                        }
                        return redirect('/tipo-login'.'/'.$pessoas['pessoa_cpf'] );
                    }
                    else
                    {
                        session()->flash('erro', 'usuario ou senha errados');
                        return redirect('/entrar');
                    }


            } catch (Exception $e) {
                    return redirect('/entrar');
            }
            

            echo $result;
            //echo $pessoas['pessoa_cpf'];
            //echo $pessoas['pessoa_senha'];
            //var_dump($ret);
            
    }


    public function tipoLogin($cpf)
    {

        $client =  new Client();
        $response = $client->get('http://api.hml01.com.br/api/pessoa/tipo/'. $cpf);
        $pessoa = json_decode($response->getBody(), true);

        

        return view('/entrar/selecao-tipo-acesso',[

            'cpf' => $cpf,
            'pessoas' => $pessoa
        ]
            );
            
    }

    public function admin($cpf)
    {
        return view('/admin/index');
    }
    
}