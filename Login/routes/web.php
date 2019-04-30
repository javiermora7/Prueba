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

//desde esl logincontroller
Route::get('perfil', 'ControllerLogin@index')->name('perfil');
//desde el nav
//por ahora funciona lo de argar login si hay una sesion iniciada...
Route::get('login', 'VerificarLogin@index')->name('login');


//esta la tengo solo para probar el nuevo template
Route::get('prueba', function(){
	return view('vistas.Perfiles.PerfilAdmin');

})->name('prueba');






//cerrar sesion
Route::get('salir', 'ControllerLogin@logout')->name('salir');

// desde el controlador para redireccionar al pefil admin
Route::get('admin', function(){
	return view('Inicio.PerfilUsuario.Admin');
})->name('admin');

// desde el controlador para redireccionar al pefil natural
Route::get('natural', function(){
	return view('Inicio.PerfilUsuario.Perfil');
})->name('natural');



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
Route::resource('categoria','CategoriaController');
Route::resource('producto','ProductoController');

});

//hacia la vista para crear una categoria
Route::get('categoria', 'CategoriaController@create')->name('categoria');
//editar un producto desde tabla natural
Route::get('editProducto/{id}', 'ProductoController@edit')->name('editProducto');
//eliminar un registro desde tabla admin
Route::get('deleteProduct/{id}', 'ProductoController@destroy')->name('deleteProduct');
//hacia la vista para crear un producto
Route::get('producto', 'ProductoController@create')->name('producto');




