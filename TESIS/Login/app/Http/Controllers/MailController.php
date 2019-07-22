<?php

namespace Login\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use Login\Evento;
use Login\User;
use Mail;
use Illuminate\Support\Facades\DB;

use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class MailController extends BaseController
{
	private $_api_context;
	public function __construct()
	{
	}

	public function index(){



	return view('vistas.Login.passwordForm');

	}

	public function EnviarMail(Request $request){

     $email = $request->mail;
     $user = User::where('email',$email)->first();


   if($user){
   //{{route('PassIndex')}} 
    $xd = route('ResetearForm', [encrypt($user->id)]);

   	$msj = '<!DOCTYPE html>';
    $msj =  $msj.'<html>';
    $msj =  $msj. '<head>'; 
    $msj =  $msj.'</head>';
    $msj =  $msj.' <body>';
    $msj =  $msj.' <p><strong>Resetear contraseña</strong></p>';
    $msj =  $msj.'<p><strong>Estimado (a)</strong><hr>'.$user->Nombres.'</p>';
    $msj =  $msj.'<p><strong>Para resetear tu contraseña, haz click en el siguiente botón</strong></p>';
    $msj =  $msj.'<center><a  type="button" href='.$xd.'> Actualizar</a></center>';
    $msj =  $msj.'</body>';
    $msj =  $msj.'</html>';

    Mail::send([], [], function ($message) use ($msj, $email) {
                      $message->to($email)
                        ->subject('Correo contacto')
                        // here comes what you want
                        // ->setBody('Hi, welcome user!'); // assuming text/plain
                        // or:
                        ->setBody($msj, 'text/html'); // for HTML rich messages
                    });
     Flash::success("Correo enviado, revise su cuenta de correo para actualizar contraseña");
	return redirect()->route('entrar'); 
			   }else{

			   	return redirect()->route('PassIndex')->withErrors('El correo no corresponde a una cuenta registrada'); 
			   }
			

	}

public function ResetearForm(Request $request){
   
   if ($request->id) {
   	  $id = decrypt($request->id);
      $user = User::where('id',$id)->first();
    if($user){
      return view('vistas.Login.Resetear',['id'=>encrypt($user->id)]);

    }else{
   	return redirect()->route('entrar')->withErrors('Usuario no registrado'); 
    }
   }else{
    return redirect()->route('entrar')->withErrors('Usuario no registrado'); 
   }


	}


 public function Resetear(Request $request){

   if ($request->pass1 && $request->pass2 && $request->key) {
       $id = decrypt($request->key);
       $user = User::where('id',$id)->first();
       if ($user) {	
        $pass1 = $request->pass1;
        $pass2 = $request->pass2;
       if($pass1 == $pass2){
      $clave = User::where('id', '=', $id)
                                      ->update(['password'=> bcrypt($pass1)]);
       if ($clave) {
             Flash::success("Contraseña actualizada");
             return redirect()->route('entrar');
       }else{
       	       	   return redirect()->route('entrar')->withErrors('Error al actualizar contraseña'); 

       }
       }else{
       	   return redirect()->route('ResetearForm', [bcrypt($user->id)])->withErrors('Usuario no registrado'); 
       }
        
       }else { 
       	   return redirect()->route('entrar')->withErrors('Usuario no registrado'); 
       }
   }else{}

  }
}

 ?>
