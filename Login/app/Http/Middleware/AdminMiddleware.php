<?php

namespace Login\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Laracasts\Flash\Flash;

class AdminMiddleware
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

    if(Auth::check() && Auth::user()->TipoUsuario_id =='2')
    {

        return $next($request);
    }
    else{
        Flash::success("No tiene permisos");
         return redirect()->route('login');
    }
}

}
