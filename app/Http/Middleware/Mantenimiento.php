<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Mantenimiento
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


        if(Auth::check() && Auth::user()->rol == 'administrador' ){
            return $next($request);
        }
            
        session()->flash('no_permitido', 'No se puede acceder. Estamos realizando tareas de mantenimiento.');
        
        return redirect() -> route('home');

        //return $next($request);
    }
}
