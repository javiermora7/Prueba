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

 
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        
    $userId = Auth::user();


       
        if(Auth::check()){
            
    
        if($userId->TipoUsuario_id == 2){

               
        $user =  User::find($userId->id);
      
        $user->tipousuario;
       
             
         $lista = DB::table('users')->orderBy('id','ASC')
           
            ->join('productos','productos.Usuario_id', '=', 'users.id')
            ->join('categoria','categoria.id', '=', 'productos.Categoria_id')
            ->where('productos.Usuario_id', '=', Auth::user()->id)
            ->select('productos.id','productos.Nombre', 'productos.PrecioCompra','productos.PrecioVenta','productos.Stock',
                'productos.descripcion','productos.Fecha','categoria.nombre')->paginate(5);

            
       
          return view('Inicio.PerfilUsuario.Perfil',['prueba' =>$user,'lista'=>$lista]);
       
        }
        else
        {
            
        $user =  User::find(Auth::user()->id);
         $user->estadoactivo;
        $user->tipousuario;
        

        $categoria =  Categoria::orderBy('id','ASC')->pluck('Categorias','id');
        $modalidad =  Modalidad::orderBy('id','ASC')->pluck('Modalidad','id');
    

           $lista = DB::table('users')->orderBy('id','ASC')
           
            ->join('evento','evento.users_id', '=', 'users.id')
            
            ->where('evento.users_id', '=', Auth::user()->id)
            ->select('Evento.id','Evento.users_id','Evento.Nombre' ,'Evento.Fotografia')->paginate(6);
  

        return view('vistas.Perfiles.PerfilAdmin',['prueba' =>$user, 'categoria'=>  $categoria, 'modalidad'=>  $modalidad, 'lista'=>  $lista]);
        
        

         
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
