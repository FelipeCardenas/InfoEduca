<?php

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

Route::get('/','PrincipalController@index');
Route::get('home','PrincipalController@index');

Route::get('eventos/create','EventoController@create')->name('eventos.create');
Route::get('eventos/index','EventoController@index')->name('eventos.index');
Route::get('eventos/{evento}','EventoController@show')->name('eventos.show');
Route::delete('eventos/{evento}','EventoController@destroy')->name('eventos.destroy'); //ver como usar el nombre y el metodo del profe

Route::get('cursos/index','EventoController@indexCurso')->name('cursos.indexCurso');
Route::get('cursos/create','EventoController@create')->name('eventos.create');

//Rutas general
Route::get('actividad/{evento}/edit','EventoController@edit')->name('actividad.edit');
Route::put('actividad/{evento}','EventoController@update')->name('actividad.update');
Route::post('actividad/create','EventoController@Store')->name('eventos.store');


//INSCRIPCION
Route::get('inscripcion/{evento_id}','EventoController@inscripcion')->name('inscripcion');
Route::post('inscripcion/store','EventoController@inscripcionStore')->name('inscripcion.store');
/*
Route::resource('eventos','EventoController');
Route::resource('usuarios','usuarioController');
*/

/* usuarios */
Route::get('usuarios/index','UsuarioController@index')->name('usuarios.index');
Route::post('usuarios/store','UsuarioController@store')->name('usuarios.store');
Route::get('usuarios/{usuario}','UsuarioController@show')->name('usuarios.show');
Route::get('usuarios/{usuario}/edit','UsuarioController@edit')->name('usuarios.edit');
Route::put('usuarios/{usuario}','UsuarioController@update')->name('usuarios.update');
Route::delete('usuarios/{usuario}','UsuarioController@destroy')->name('usuarios.destroy');


/* mensajes */
Route::get('mensajes/index','MensajeController@index')->name('mensajes.index');
Route::post('mensajes/store','MensajeController@store')->name('mensajes.store');
Route::get('mensajes/{mensaje}','MensajeController@show')->name('mensajes.show');
Route::get('mensajes/{mensaje}/edit','MensajeController@edit')->name('mensajes.edit');
Route::put('mensajes/{mensaje}','MensajeController@update')->name('mensajes.update');


Route::delete('mensajes/{mensaje}','MensajeController@destroy')->name('mensajes.destroy');
Route::get('mensajes/create','MensajeController@create')->name('mensajes.create');

//Eliminar relaciones
Route::get('evento/mensaje/{mensaje}/{evento}','MensajeController@mensajeDettach')->name('evento.mensaje');
Route::get('evento/usuario/{usuario}/{evento}','EventoController@usuarioDettach')->name('evento.usuario');
Route::get('usuario/mensaje/{mensaje}/{usuario}','UsuarioController@mensajeDettach')->name('usuario.mensaje');

//Logins
Route::get('loginHome','PrincipalController@loginHome')->name('loginHome');
Route::post('usuarios/login','PrincipalController@login')->name('usuarios.login');