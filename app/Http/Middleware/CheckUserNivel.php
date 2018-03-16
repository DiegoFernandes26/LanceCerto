<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserNivel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$nivel)
    {
        if(Auth()->user()->tipo > $nivel){
            return back()->withErrors('Você não tem permição para acessar a área prentedida!');
        }
        return $next($request);
    }
}
