<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Login\User;
use Illuminate\Support\Facades\Auth;
use Login\TipoUsuario;
use Login\Categoria;
use Login\Producto;
use Login\Evento;
use Laracasts\Flash\Flash;
use Illuminate\Contracts\Encryption\DecryptException;

use Login\Http\Requests\CategoriaRequest;
use Login\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Crypt;

class ProductoController extends Controller
{
    function __construct(){
     
    $this->middleware('natural');    


    }
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
       $categoria =  Categoria::orderBy('id','ASC')->pluck('nombre','id');
       
   
 
        return view('Inicio.registro.RegistroProducto',['categoria' =>$categoria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto($request->all());
        
        $producto->Usuario_id = Auth::user()->id;
        $producto->save();
        Flash::warning("el producto" ." ". $producto->nombre." ". " ha sido registrado exitosamente");
          return redirect()->route('inicio');
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
   {  $id =  decrypt($id);
  
        

     
        $producto= Evento::find($id);
          //$categoria =  Categoria::orderBy('id','ASC')->pluck('nombre','id');

        return view('Inicio.Edicion.EditarProducto',['producto' =>$producto]);
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
         $producto= Producto::find($id);
   
        $producto->Nombre = $request->Nombre;
        $producto->PrecioCompra = $request->PrecioCompra;
        $producto->PrecioVenta = $request->PrecioVenta;
     
        $producto->Stock = $request->Stock;
        $producto->descripcion= $request->descripcion;
         $producto->Fecha = $request->Fecha;
        $producto->Categoria_id = $request->Categoria_id;
       
        $producto->save();
Flash::warning("el producto" ." ". $producto->Nombre." ". " ha sido editado exitosamente");
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

       $producto= Producto::find($id);
        $producto->delete();

        Flash::error("el producto" ." ". $producto->Nombre." ". " ha sido borrado exitosamente");
        return redirect()->route('inicio');
}else{

    return redirect('login');
}
    }
}
