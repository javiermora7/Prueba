<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use BlenderDeluxe\Khipu\Khipu;
use Khipu\KhipuApiClient\lib\ApiClient;
use khipu\KhipuApiClient\lib\Configuration;
use khipu\KhipuApiClient\lib\Client\PaymentsApi;
use Session;
use Login\Evento;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class KhipuController extends Controller
{
   function __construct(){
     
    $this->middleware('natural');    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      public function postPayment(Request $request){
      
			$id=$request->id;

			Session::put('id_publication',$id);
      $Khipu = new Khipu();
     $Khipu->authenticate(241771,'aba0127964b559fac633fbf40daea6ba436d7739');
      $khipu_service = $Khipu->loadService('CreatePaymentPage');

      $data = array(
        'subject' => 'Paga tu evento',
        'body' => 'El pago sera una subcripcion mensual',
        'amount' => 35000,
        // Página de exitohttp://127.0.0.1:8000>
        'return_url' => 'http://127.0.0.1:8000/pagar/exito/'.$id,
        // Página de fracaso
        'cancel_url' => 'http://127.0.0.1:8000/pagar/fracaso'.$id,
        'transaction_id' => 1,
        // Dejar por defecto un correo para recibir el comprobante
        'payer_email' => \Auth::User()->email,
        // url de la imagen del producto o servicio
        'picture_url' => 'https://static-pss-eu.gcdn.co/shop/media/items/c7/c7/c7c7ea349fe04222b617413c80c95ee4.png',
        // Opcional
        'custom' => 'Custom Variable',
        // definimos una url en donde se notificará del pago
        'notify_url' => '',
      );
      // Recorremos los datos y se lo asignamos al servicio.
      foreach ($data as $name => $value) {
        $khipu_service->setParameter($name, $value);
      }
      // Luego imprimimos el formulario html
         // echo  $khipu_service->renderForm();x
          
    $xd = route('perfil');//aca se define para el boton cancelar
     $evento = Evento::where( 'id', $id )->first();
   //aqui creo el formulario xd
    echo '<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">';
    echo '<link rel="stylesheet" type="text/css" href="/css/khipu/khipu.css">';
        
    echo '<div class ="FomrKhipu" >
        <h1>Pago del evento '.$evento->Nombre.'</h1>
        <h2>Para proceder con la activación del evento, por favor continue  con el pago en el siguiente botón: </h2>'.
        '<hr>'
         .$khipu_service->renderForm().'<br>'.
         '<h2>de lo contrario, seleccione "Cancelar"</h2>'.
         '<hr>'.'<a href='.$xd.'>Cancelar</a>'.
          '<hr>'.
         '</div';
        Flash::warning("Pago del evento" ." ". $evento->Nombre." ". " ha sido cancelado");
//$data = $khipu_service->renderForm();
//return response($data);
  //echo  $khipu_service->renderForm();
     
    }

    public function exito ($id){
    $now = Carbon::now();
  
        if($id != null  && $id != ''){
          
     $factura =    DB::table('factura')
                   ->insertGetId([
                   'empresa' => 'TercerTiempo', 
                    'fecha' => $now,
                    'rut_empresa' => '19.165.643-k',
                    'giro' => 'Administración de eventos deportivos en linea',
                    'create_at' => $now,
                    'update_at' => $now,
                    'user_id'=> Auth::user()->id
                   
             ]);
             
          if($factura){
             $detalle_factura =    DB::table('detalle_factura')
                   ->insertGetId([
                   'factura_id' => $factura, 
                    'evento_id' => $id,
                    'precio' => 35000,
                    'create_at' => $now,
                    'update_at' => $now
             ]);
            if( $detalle_factura){
                $pago =    DB::table('pagos')
                   ->insertGetId([
                    'factura_id' => $factura, 
                    'estado_pago' => 1,
                    'mediodepago' => 'khipu',
                    'user_id'=>Auth::user()->id,
                    'create_at' => $now,
                    'update_at' => $now
             ]);
             if($pago){
                 $evento = Evento::where( 'id', $id )->first();
             if($evento){
                $evento->EstadosActivo_id = 2;
                $evento->fecha_mensualidad= $now;
                $evento->save();
                Flash::success("El evento" ." ". $evento->Nombre." ". " ha sido activado satifactoriamente");
                //dd($evento);
           return redirect()->route('perfil');
             }
            }
            else{
             Flash::danger("Error en pago del evento " ." ". $evento->Nombre." ". " por favor intente nuevamente");
             return redirect()->route('perfil');
            }
          }else
          {
             Flash::danger("Error en pago del evento " ." ". $evento->Nombre." ". " por favor intente nuevamente");
             return redirect()->route('perfil');
          }
   
             }else 
             {
            Flash::danger("Error en pago del evento " ." ". $evento->Nombre." ". " por favor intente nuevamente");
             return redirect()->route('perfil');
             }

         }
       
               

         }

    public function fracaso ($id){

         Flash::danger("Error en pago del evento " ." ". $evento->Nombre." ". " por favor intente nuevamente");
        
           return redirect()->route('perfil');
    }




}
