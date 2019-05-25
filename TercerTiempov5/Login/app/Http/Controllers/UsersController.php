<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Login\User;
use Illuminate\Support\Facades\Auth;
use Login\TipoUsuario;
use Login\Categoria;
use Laracasts\Flash\Flash;

use Login\Http\Requests\CategoriaRequest;
use Login\Http\Requests\UserRequest;

class UsersController extends Controller
{

    function __construct(){
     
    $this->middleware('admin');    


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        

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
    {$id =  decrypt($id);
        $user= User::find($id);

    return view('Inicio.Edicion.EditarUsuario',['user' =>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
   
       
   
      $users= User::find($id);
   
        $users->name = $request->name;
        $users->Apellido = $request->Apellido;
        $users->Telefono = $request->Telefono;
     
        $users->password = bcrypt($request->password);
        $users->RazonSocial= $request->RazonSocial;
        $users->save();
Flash::warning("el usuario" ." ". $users->name." ". " ha sido editado exitosamente");
          return redirect()->route('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    if(Auth::check()){

        $user = User::find($id);
        $user->delete();

        Flash::error("el usuario" ." ". $user->name." ". " ha sido borrado exitosamente");
        return redirect()->route('inicio');
}else{

    return redirect('login');
}

    }
}
