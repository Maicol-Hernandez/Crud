<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class soloSupervisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        switch (auth::user()->tipo) {
            case ('1'):
                # Si es agente redirige al /agente
                return redirect('agente');
                break;
            case ('2'):
                # Si es supervisor redirige al /supervisor
                return  $next($request) ;
                break;
            case ('3'):
                # Si es administrador redirige al /home
                return redirect('home')  ;
                
                break;

            default:
                # code...
                break;
        }
    }
}
