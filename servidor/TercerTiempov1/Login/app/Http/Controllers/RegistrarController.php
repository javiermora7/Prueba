<?php

namespace Login\Http\Controllers;
use Illuminate\Http\Request;
use Login\User;
use Illuminate\Support\Facades\Auth;
use Login\TipoUsuario;
use Laracasts\Flash\Flash;


use Login\Http\Requests\UserRequest;


class RegistrarController extends Controller
{
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
        return view('vistas.Registro.Registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responses
     */
    public function store(Request $request)

    {
        $validar = User::where('email',$request->email)->first();

        if ($validar) {
            return redirect()->route('registrar')->withErrors(['Correo ya registrado']);
        }
           $user = new User($request->all());
           $tipo="1";
           $estado="2";
           $user->password= bcrypt($request->password);
           $user->TipoUsuario_id = $tipo;   
           $user->EstadosActivo_id = $estado;
      

        try {
                    
      
          $user->save();
          Flash::success("bienvenido, inicie sesiòn" ." ". $user->Nombres);
          return redirect()->route('entrar');
            
         } catch (Exception $e) {
          
            return redirect()->route('registrar')->with('message', 'error de registro');
            
        }
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
}
