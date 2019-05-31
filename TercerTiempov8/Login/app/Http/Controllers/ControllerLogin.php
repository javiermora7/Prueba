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
use Login\Modalidad;
use Login\Evento;
use Cache;
use Sesion;
use Redirect;
use Cookie;
class ControllerLogin extends Controller
{

 
   
    function __construct(){
     
    $this->middleware('cache');    

    }
     public function index()
    {
        
    $userId = Auth::user();


       
        if(Auth::check()){
            
    
        if($userId->TipoUsuario_id == 2){

        $user =  User::find(Auth::user()->id);
        $user->estadoactivo;
        $user->tipousuario;
      
  $listauser = DB::table('users')->orderBy('id','ASC')
                      ->join('evento','evento.users_id', '=', 'users.id')
                      ->join('EstadosActivo','users.EstadosActivo_id', '=', 'EstadosActivo.id')
                      ->where('users.TipoUsuario_id', '=', '1')
                      ->groupBy('users.id','users.id', 'users.Nombres', 'users.Apellidos',
                       'users.EstadosActivo_id', 'EstadosActivo.Estado')
                      ->select('users.id', 'users.Nombres', 'users.Apellidos',
                       'EstadosActivo.Estado as estado', DB::raw('count(evento.users_id) as eventos'))->paginate(6);

        return view('vistas.Root.PerfilRoot',['user' =>$user, 'listauser' =>  $listauser]);
               
      
       
        }
        else
        {
            
        $user =  User::find(Auth::user()->id);
         $user->estadoactivo;
        $user->tipousuario;
        

        $categoria =  Categoria::orderBy('id','ASC')->pluck('Categorias','id');
        $modalidad =  Modalidad::orderBy('id','ASC')->pluck('Modalidad','id');
    

           $campeonato = DB::table('users')->orderBy('id','ASC')
           //listar eventos en el perfil del usuario
            ->join('evento','evento.users_id', '=', 'users.id')
                  ->where('evento.users_id', '=', Auth::user()->id)
                  ->select('Evento.id','Evento.users_id','Evento.Nombre' ,'Evento.Fotografia',
                   'Evento.EstadosActivo_id')->paginate(6);
  

        return view('vistas.Perfiles.PerfilAdmin',['user' =>$user, 'categoria'=>  $categoria, 'modalidad'=>  $modalidad, 'campeonato'=>  $campeonato]);
     
    }
}
else{
     

    return redirect('entrar')->withErrors(['inicie sesiòn']); 
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
