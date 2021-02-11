<?php

use Illuminate\Support\Facades\Route;

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


//------------------------------------------------------
//	  		Esta ruta predefinida de localhost:8000
//			LLeva a la vista views/welcome.blade.php
//------------------------------------------------------
Route::get('/', function () {

	 $obj=DB::table('imagen')
            ->orderBy('id','desc')
            ->paginate(6);


	//LLeva directamente a la vista welcome.blade.php 
	//"lo cambiamos a que mueste index.blade".
    return view('index',["imagenes"=>$obj]);
    //return view('auth/login');
});


//--------------------------------------------------------------------
//  	1.-La ruta get indica que despues de logearse al sistema
//		   mostrara la plantilla views/home.blade.php
//		2.-home indica la ruta que se mostrara en el navegador.
//		3.-HomeController@index es el metodo que retornara la vista. 		
//--------------------------------------------------------------------
Auth::routes();
//Cambiamos par que muestre despues del login la plantilla principal.
Route::get('/home', 'HomeController@index')->name('home');//Realiza la misma funcion.
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Instruccion donde especifica si el usuario ingresa en el navegador una ruta que no pertenece al proyecto sea redireccionado al archivo 'HomeController@index' predeterminado por Laravel.
Route::get('/{slug?}', 'HomeController@index')->name('home');





/*----------------------------------------------------------------
				Mis rutas creadas para el proyecto.
------------------------------------------------------------------*/


//Instruccion que se encarga de gestionar todos los metodos del controlador. "simplificado".
//Se encarga de gestionar todos los metodos de gestionar tema.

//Primer parametro: ruta donde buscara la carpeta donde se encuentran las plantillas blade.
//Segundo paramtero: ruta donde se encuentra el controlador.
Route::resource('/parametros/categoria','ModParametro\categoriaController');


Route::resource('/parametros/tag','ModParametro\tagController');


Route::resource('/galeria/imagen','ModGaleria\imagenController');






