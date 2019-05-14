<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;

class ManejoSide extends Controller
{

	//aca hay que  crear un algoritmo para comparar el manejo con las sesiones
    function index (){

    	return view('vistas.Fechas.FechasEncuentros');
    }
}
