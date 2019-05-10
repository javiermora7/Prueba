<?php

namespace Login\Http\Controllers;
use Login\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



use Socialite;

use Login\User;

use Session;
use Redirect;



class VerificarLogin extends Controller
{
     public function __construct()
    {
        $this->middleware('guest');
    }


    function index (){

    	return view('vistas.Login.Login');
    }




}
