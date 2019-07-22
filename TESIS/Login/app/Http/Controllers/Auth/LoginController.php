<?php

namespace Login\Http\Controllers\Auth;

use Login\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



use Socialite;

use Login\User;

use Session;
use Redirect;

class LoginController extends Controller
{
   

    use AuthenticatesUsers;

   
    
    protected $redirectTo = '';//Ruta inicio
    protected $username = 'email';//Columna para el logueo
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  

        
   
     public function authenticate(Request $request)
    {     
       
      $email = $request->input('email');
      $password = $request->input('password'); 

     if (Auth::attempt(['email'=>$email, 'password'=> $password])) {

         return redirect()->route('perfil');
     }

        else{
            return redirect('entrar')->withErrors(['Correo y/o contraseña incorrectas.']);    
        }

    }



       public function aut($correo, $clave)
    {     
       
      $email = $request->input('email');
      $password = $request->input('password'); 

     if (Auth::attempt(['email'=>$email, 'password'=> $password])) {

         return redirect()->route('perfil');
     }

        else{
            return redirect('entrar')->withErrors(['Correo y/o contraseña incorrectas.']);    
        }

    }
    }

  

