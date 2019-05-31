<?php

namespace Login\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon ;

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
        
     


        $eventos = DB::table('Evento')->where('Evento.EstadosActivo_id', '=', 2)
                                       ->select('id','FechaInicio')->get();
       
        if ($eventos) {
            foreach ($eventos as $evento) {

              
                $start= Carbon::parse($evento->FechaInicio);
                $diference= $FechaActual->diffForHumans($start);
                
                if(preg_match('/3\ssemanas/', $diference)){//traducir en español e ingles
                    echo $diference;                       //se manda correo o notificacion de advertencia
                    
                }elseif(preg_match('/mes/', $diference)){//se corta el plan
                    
                   $result = DB::table('Evento')
                                      ->where('evento.id', '=', $evento->id)
                                      ->update(['EstadosActivo_id'=> 1]);
                }
            }
        } else {
            return false;
        }
        
    }
}
