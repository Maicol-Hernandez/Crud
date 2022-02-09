<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class soloAdmin
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
                return  redirect('supervisor');
                break;
            case ('3'):
                # Si es administrador redirige al /home
                return $next($request);
                break;

            default:
                # code...
                break;
        }

        // if (auth::user()->fullacces == 'yes') :
        //     return $next($request);
        // endif;
        // return redirect('user');
    }
}
