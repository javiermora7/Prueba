<?php

namespace Login\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Login\Evento;


use Illuminate\Support\Facades\DB;

use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class PaypalController extends BaseController
{
	private $_api_context;
	public function __construct()
	{

		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}
	public function postPayment($idevento)
	{
		Session::put('idevento', $idevento);
     	$id=$idevento;
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array();
        $evento= Evento::find($idevento);
		$subtotal = 0; //luego asigno sus valores al pago de paypal
		// dd($publication);

		$name=$evento['Nombre'];
		$extract=$evento['Descripcion'];
		$quantity=1;
		$price=3.02;//cambiar a precio de nosotros en dolares
    $currency = 'USD';
		/*if (($quantity*$price)*0.02>20000) { //maximo cobro por publication
			$quantity=1;
			$price=20000;
		}else {
			$quantity=1;
			$price=($quantity*$price)*0.02;
		}
*/
			$item = new Item();
			$item->setName($name)
			->setCurrency($currency)
			->setDescription($extract)
			->setQuantity($quantity)
			->setPrice($price);

			$items[] = $item;

		$subtotal = $quantity * $price;


		$item_list = new ItemList();
		$item_list->setItems($items);
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);
		$total = $subtotal+0;



		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pago subcripción mensual');
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				  Flash::success("ups! salio un error");
                  return redirect()->route('perfil');
			}
		}
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		Flash::success("ups! salio un error desconocido");
                  return redirect()->route('perfil');
	}
	public function getPaymentStatus() //obtenemos la respuesta de paypal
	{
		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');
		// clear the session payment ID
		Session::forget('paypal_payment_id');
		$payerId = Input::get('PayerID');
		$token = Input::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			Flash::success("problemas al pagar con paypal");
                  return redirect()->route('perfil');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary
		// to execute a PayPal account payment.
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));
		//Execute the payment
		if (Session::has('idevento'))
{
	// dd(Session::get('id_publication'));
    $result = $payment->execute($execution, $this->_api_context);

}else {
	Flash::success("problemas al pagar con paypal");
                  return redirect()->route('perfil');
}

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			// $this->saveOrder(\Session::get('cart'));
			// \Session::forget('cart');
			//$evento = Evento::find(Session::get('idevento'));//obtenemos la publicacion que se esta pagando
			
            $now = Carbon::now();
             $id = Session::get('idevento');
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
                    'mediodepago' => 'Paypal',
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
		return \Redirect::route('micuentaR')
			->with('message', 'La compra fue cancelada');
	}
	public function micuentaR()
	{
		   Flash::success("El evento @ ha sido activado satifactoriamente");
           
           return redirect()->route('perfil');
	}



}

 ?>
