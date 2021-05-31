<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

         if(!session()->has('user')){
                return redirect('/entrar');
            }
        return $next($request);
    }
}
