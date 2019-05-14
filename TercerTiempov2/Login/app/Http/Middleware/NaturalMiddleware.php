<?php

namespace Login\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Laracasts\Flash\Flash;
class NaturalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->Usuario_idUsuario =='1')
    {

        return $next($request);
    }
    else{
        Flash::success("debe iniciar sesion");
         return redirect()->route('entrar');
    }
    }
}
