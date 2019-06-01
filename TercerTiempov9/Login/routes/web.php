<?php
use Login\User;
use Login\TipoUsuario;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('nada', function(){
	$user = Login\User::find(6);
    $user->tipousuario;
	dd($user);
});*/

//desde esl logincontroller, tambien ocupado en el sidebar para ingresar a perfil de admin(clientes)
Route::get('Root', 'ControllerLogin@index')->name('Root');


//desde esl logincontroller, tambien ocupado en el sidebar para ingresar a perfil de admin(clientes)
Route::get('perfil', 'ControllerLogin@index')->name('perfil');
//desde el sidebar
Route::get('Fechas/{id}', 'ManejoSide@index')->name('Fechas');
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
Route::resource('equipo','ModuloEquipo');
});

//probar el crear evento con esta ruta y no resource
Route::post('CrearEvento', 'ModuloEventoController@store')->name('CrearEvento');

//probar vista equipo
Route::get('perequipo', function(){
	return view('vistas.Evento.Evento');
})->name('perequipo');

//ver perfil de  un evento
//Route::get('VerPerfil/{id}', 'ModuloEventoController@show')->name('VerPerfil');
Route::get('VerificarPerfilEvento/{id}', 'ModuloEventoController@verificar')->name('VerificarPerfilEvento');

//editar un evento
Route::get('editEvento/{id}', 'ModuloEventoController@edit')->name('editEvento');

//editar perfil de usuario
Route::get('EditPerfil/{id}', 'UsersController@edit')->name('EditPerfil');


//eliminar un evento
Route::get('DeleteEvento/{id}', 'ModuloEventoController@UpdateEvent')->name('DeleteEvento');

//khipu
Route::get('/khipu/{id}', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => '/khipu',
	'uses' => 'KhipuController@postPayment',
));

Route::get('/PruebaKhipu/{id}', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => '/PruebaKhipu',
	'uses' => 'KhipuController@postPayment',
));


Route::get('pagar/exito/{id}', 'KhipuController@exito');

Route::get('pagar/fracaso/{id}', 'KhipuController@fracaso');
/*
Route::get('/{id}', 'KhipuController@fracaso')->name('pagarkhipu');
*/
