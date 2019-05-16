<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Login\User;
use Login\TipoUsuario;
use Login\Categoria;
use Login\Producto;
use Login\EstadoActivo;
use Cache;
use Sesion;
use Redirect;
use Cookie;
class ControllerLogin extends Controller
{

 
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $userId = Auth::user();

       //dd(Auth::user());
        if(Auth::check()){
            
             
        $user =  User::find(Auth::user()->id);
        $user->tipousuario;
       $user->estadoactivo;
        $lista =  User::orderBy('id','ASC')->paginate(5);
       //con eso veo los datos que voy pasando
       //dd($user);
     
        return view('vistas.Perfiles.PerfilAdmin',['prueba' =>$user, 'lista'=>$lista] );
        
    

       } else
        {
            

     
//return redirect('entrar')->withErrors(['inicia sesion']); 
     return redirect('entrar')->withErrors(['maaaaaal']); 
}
         
    
}

   public function logout(){

    Auth::logout();
   Cache::put('key', 'value', 0);
    return redirect()->route('entrar');
}

    /**
     * Show the forml for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /* $email = $request->input('email');
      $password = $request->input('password');      //dd('estoy en store');
     if (Auth::attempt(['email'=>$email, 'password'=> $password])) {
         return redirect()->route('inicio');
     }

        else{
            return redirect('login')->withErrors(['Documento y contraseña incorrectas.']);    
        }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function login(){

  




    }
}
