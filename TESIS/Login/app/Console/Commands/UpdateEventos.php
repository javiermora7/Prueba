<?php

namespace Login\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon ;

use Sesion;
use Redirect;
use Mail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Login\User;
use Login\TipoUsuario;
use Login\EstadoActivo;
use Login\Categoria;
use Login\Modalidad;
use Login\Evento;
use Login\Equipo;
use \Http\Controllers\Crypt;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Storage;
use File;


use Cookie;

class UpdateEventos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateEventos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $FechaActual = Carbon::now(); 
        
             $eventos = DB::table('Evento') ->join('Users','users.id', '=', 'Evento.users_id')
                                       ->where('Evento.EstadosActivo_id', '=', 2)
                                       ->select('Evento.id','Evento.fecha_mensualidad','Users.email')->get();                                   
        if ($eventos) {
            foreach ($eventos as $evento) {

             
                $start= Carbon::parse($evento->fecha_mensualidad);
                $diference= $FechaActual->diffForHumans($start);
                
                if(preg_match('/3\ssemanas/', $diference)){//traducir en español e ingles
                    //se manda correo o notificacion de advertencia, moti = 1 es por vencer, moti 2 = vencio, estado 1 = no se notifico
                    //estado  = 2 se notifico   
                    $datos= DB::table('Evento') ->join('Users','users.id', '=', 'Evento.users_id')
                                       ->where('evento.id', '=', $evento->id)
                                       ->where('evento.NotiMotivo','!=', 1)
                                       ->where('evento.NotiMotivo','!=', 2)
                                       ->select('Users.email','Users.Nombres')->first();
                 if ($datos) {
                     
                 
                    $result = DB::table('Evento')
                        ->where('evento.id', '=', $evento->id)
                        ->update(['fecha_mensualidad'=> $FechaActual,'NotiMotivo' => 1, 'NotiEstado' => 2]);

                    $email = $evento->email;
                    $msj = '<!DOCTYPE html>';
                    $msj =  $msj.'<html>';
                    $msj =  $msj. '<head>'; 
                    $msj =  $msj.'</head>';
                    $msj =  $msj.' <body>';
                    $msj =  $msj.' <p><strong>Boleta</strong><hr>'.$FechaActual.'</p>';
                    $msj =  $msj.'<p><strong>Estimado (a)</strong><hr>'.$datos->Nombres.'</p>';
                    // $msj =  $msj.'<p><strong>N° Teléfono :</strong></p>';
                    $msj =  $msj.'<p><strong>Su subcripción está por vencer, Monto a cancelar:</strong>$40.000</p>';
                    $msj =  $msj.'</body>';
                    $msj =  $msj.'</html>';
                  Mail::send([], [], function ($message) use ($msj, $email) {
                                $message->to($email)
                                ->subject('Correo contacto')
                                ->setBody($msj, 'text/html'); 
                                });
                  }   

                }elseif(preg_match('/mes/', $diference)){//se corta el plan
                    
                $datos= DB::table('Evento') ->join('Users','users.id', '=', 'Evento.users_id')
                                   ->where('evento.id', '=', $evento->id)
                                   ->where('evento.NotiMotivo','!=', 2)
                                   ->select('Users.email','Users.Nombres')->first();
                if ($datos)
                 {
                                      
                                  
                $result = DB::table('Evento')
                    ->where('evento.id', '=', $evento->id)
                    ->update(['fecha_mensualidad'=> $FechaActual, 'EstadosActivo_id'=> 1, 'NotiMotivo' => 2, 'NotiEstado' => 2]);

                $email = $evento->email;
                $msj = '<!DOCTYPE html>';
                $msj =  $msj.'<html>';
                $msj =  $msj. '<head>'; 
                $msj =  $msj.'</head>';
                $msj =  $msj.' <body>';
                $msj =  $msj.' <p><strong>Boleta</strong><hr>'.$FechaActual.'</p>';
                $msj =  $msj.'<p><strong>Estimado (a)</strong><hr>'.$datos->Nombres.'</p>';
                // $msj =  $msj.'<p><strong>N° Teléfono :</strong></p>';
                $msj =  $msj.'<p><strong>Subcripción vencida, Monto a cancelar:</strong>$40.000</p>';
                $msj =  $msj.'</body>';
                $msj =  $msj.'</html>';
                    Mail::send([], [], function ($message) use ($msj, $email) {
                      $message->to($email)
                        ->subject('Correo contacto')
                        
                        ->setBody($msj, 'text/html'); 
                    });
                }else{
                    return false;
                }
              }
            }
        } else {
            return false;
        }
        
    }
}
