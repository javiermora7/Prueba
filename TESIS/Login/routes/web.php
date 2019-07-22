<?php
use Login\User;
use Login\TipoUsuario;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a groucp which
| contains the "web" mihddleware group. Now create something great!
|
*/
/*Route::get('nada', function(){
	$user = Login\User::find(6);
    $user->tipousuario;
	dd($user);
});*/


Route::get('/', function () {
    return view('index');
});

//desde esl logincontroller, tambien ocupado en el sidebar para ingresar a perfil de admin(clientes)
Route::get('Root', 'ControllerLogin@index')->name('Root');


//desde esl logincontroller, tambien ocupado en el sidebar para ingresar a perfil de admin(clientes)

Route::get('perfil', 'ControllerLogin@index')->name('perfil');
//desde el sidebar
Route::get('Fechas/{id}', 'ManejoSide@index')->name('Fechas');
Route::get('Arbitro/{id}', 'ManejoSide@Arbitro')->name('Arbitro');
Route::get('Estadisticas/{id}', 'ManejoSide@Estadisticas')->name('Estadisticas');


//por ahora funciona lo de argar login si hay una sesion iniciada....
Route::get('entrar', 'VerificarLogin@index')->name('entrar');


//esta la tengo solo para probar el nuevo template
Route::get('prueba', function(){
	return view('vistas.Evento.Evento');

})->name('prueba');






//cerrar sesion
Route::get('salir', 'ControllerLogin@logout')->name('salir');

// desde el controlador para redireccionar al pefil admin
Route::get('admin', function(){
	return view('Inicio.PerfilUsuario.Admin');
})->name('admin');





//Route::resource('ingresar','ControllerLogin');

Route::get('index', function(){
	return view('Inicio.IndexPrincipal.Index');
});




//desde la vista login
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
//Route::post('login', 'ControllerLogin@store')->name('login');


/*Route::group(['middleware'=>['auth']], function (){
Route::resource('usuario', 'UsersController');
});*/




//eliminar un registro desde tabla admin
Route::get('delete/{id}', 'UsersController@destroy')->name('delete');
//editar un registro desde tabla admin
Route::get('edit/{id}', 'UsersController@edit')->name('edit');
//editar un registro desde el formulario brindado desde arriba
//Route::put('update', 'UsersController@update')->name('update');

//registro de usuario la cual reedigira al formulario de abajo
Route::get('registrar', 'RegistrarController@create')->name('registrar');



//ruta desde formulario de registrar usuario y crear una categoria
Route::group(['prefix'=>'usuario'], function (){
Route::resource('users','RegistrarController');
Route::resource('user','UsersController');
Route::resource('campeonato','ModuloEventoController');
Route::resource('Equipo','ModuloEquipo');
//PASAR A OTRO PROYECTO IGUAL
Route::resource('equipo','ParticipanteController');
});


//probar el crear evento con esta ruta y no resource
Route::post('CrearEvento', 'ModuloEventoController@store')->name('CrearEvento');

//probar vista equipo
Route::get('perequipo', function(){
	return view('vistas.Evento.Evento');
})->name('perequipo');

//ver perfil de  un evento
Route::get('VerificarPerfilEvento/{id}', 'ModuloEventoController@verificar')->name('VerificarPerfilEvento');


//editar un evento
Route::get('editEvento/{id}', 'ModuloEventoController@edit')->name('editEvento');

//eliminar un evento
Route::get('DeleteEvento/{id}', 'ModuloEventoController@UpdateEvent')->name('DeleteEvento');

//ver perfil de un equipo
Route::get('VerificarPerfilEquipo/{id}/{id2}', 'ModuloEquipo@verificarequipo')->name('VerificarPerfilEquipo');


//editar un equipo
Route::get('editEquipo/{id}/{id2}', 'ModuloEquipo@edit')->name('editEquipo');
//eliminar un equipo
Route::get('DeleteEquipo/{id}/{id2}', 'ModuloEquipo@UpdateEquipo')->name('DeleteEquipo');


//editar perfil de usuario
Route::get('EditPerfil/{id}', 'UsersController@edit')->name('EditPerfil');

//editar contraseña
Route::get('EditarClave/{id}', 'UsersController@EditarClave')->name('EditarClave');
Route::POST('updateclave/{id}', 'UsersController@updateclave')->name('updateclave');


//khipu
Route::get('/khipu/{id}', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => '/khipu',
	'uses' => 'KhipuController@postPayment',
));

Route::get('/PruebaKhipu/{id}', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => '/PruebaKhipu',
	'uses' => 'KhipuController@postPayment',
));


Route::get('pagar/exito/{id}', 'KhipuController@exito')->name('exito');

Route::get('pagar/fracaso/{id}', 'KhipuController@fracaso')->name('fracaso');;
/*
Route::get('/{id}', 'KhipuController@fracaso')->name('pagarkhipu');
*/
//////////////////////////////////////7
///
Route::get('index', 'CibernautaController@index')->name('index');
//ver el perfil de un campeonato
Route::get('Campeonato/{id}', 'CibernautaController@verificar')->name('Campeonato');
//ver el perfil del equipo
Route::get('Equipo//{id}/{id2}', 'CibernautaController@verificarequipo')->name('Equipo');

/////paypal pasar de aca 

Route::get('micuentaR', [ //es para el resultado de paypal
	'as' => 'micuentaR',
	'uses' => 'PaypalController@micuentaR',
]);

Route::get('payment/{id}', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(  //recibimos lo que nos conteste paypal
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));


// ////Crear evento
// Route::get('CrearEvento', 'ModuloEventoController@create')->name('CrearEvento');

// Route::get('Fechas/{id}', 'ManejoSide@index')->name('Fechas');

// Route::post('Encuentros', 'EncuentroController@store')->name('Encuentros');

// Route::post('GuardarResultado', 'ManejoSide@GuardarResultado')->name('GuardarResultado');

// Route::get('AgregarFecha/{id}', 'ManejoSide@AgregarFecha')->name('AgregarFecha');

// Route::post('VerFechas', 'FechaController@index')->name('VerFechas');

// Route::post('GuardarFecha', 'FechaController@store')->name('GuardarFecha');


//PASAR, CREAR JUGADOR
Route::get('Jugador/{id}/{id2}', 'ParticipanteController@Jugador')->name('Jugador');
Route::get('DeleteJugador/{id}/{id2}/{id3}', 'ParticipanteController@UpdateJugador')->name('DeleteJugador');
Route::get('editEquipo/{id}/{id2}', 'ModuloEquipo@edit')->name('editEquipo');


//recuperar contraseña  /resetear/index
Route::get('/resetear/index', 'MailController@index')->name('PassIndex');

Route::post('/resetear/pass', 'MailController@EnviarMail')->name('EnviarMail');
//enviamos en boton
Route::get('ResetearForm/{id}', 'MailController@ResetearForm')->name('ResetearForm');

Route::post('Resetear', 'MailController@Resetear')->name('Resetear');
//Registrarr como empresa
Route::get('RegistroEmpresa', 'RegistrarController@RegistroEmpresa')->name('RegistroEmpresa');

//eventos
Route::get('CrearEvento', 'ModuloEventoController@create')->name('CrearEvento');

Route::get('Fechas/{id}', 'ManejoSide@index')->name('Fechas');

Route::post('Encuentros', 'EncuentroController@store')->name('Encuentros');

Route::post('GuardarResultado', 'ManejoSide@GuardarResultado')->name('GuardarResultado');

Route::get('AgregarFecha/{id}', 'ManejoSide@AgregarFecha')->name('AgregarFecha');

Route::post('VerFechas', 'FechaController@index')->name('VerFechas');

Route::post('GuardarFecha', 'FechaController@store')->name('GuardarFecha');


Route::post('ResultadoEncuentros', 'ResultadoEncuentroController@index')->name('ResultadoEncuentros');

Route::post('IniciarPartido', 'ResultadoEncuentroController@IniciarPartido')->name('IniciarPartido');

Route::post('ResultadoEncuentro', 'IngresoResultadoEncuentroController@index')->name('ResultadoEncuentro');

Route::post('IngresarResultado', 'IngresoResultadoEncuentroController@store')->name('IngresarResultado');



Route::get('cambiarEstadoPrueba', 'ManejoSide@cambiarestado')->name('cambiarEstadoPrueba');

Route::get('Fechas/{id}', 'ManejoSide@index')->name('Fechas');