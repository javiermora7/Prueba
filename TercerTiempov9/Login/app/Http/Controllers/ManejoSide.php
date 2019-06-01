<?php

namespace Login\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Login\User;
use Login\TipoUsuario;
use Login\EstadoActivo;
use Login\Categoria;
use Login\Modalidad;
use Login\Evento;
use Login\Equipo;
use \Http\Controllers\Crypt;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;

use Sesion;
use Redirect;
use Cookie;


class ManejoSide extends Controller
{

	//aca hay que  crear un algoritmo para comparar el manejo con las sesiones
    function index ($id){

   $id =  decrypt($id);
    $user =  Auth::user();
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;

    	return view('vistas.Fechas.FechasEncuentros',['evento' =>$evento]);
    }
}
