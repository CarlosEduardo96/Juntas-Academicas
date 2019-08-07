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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

/**Inicio */
Route::get('/','LoginController@inicio');

Route::get('/login','LoginController@inicio')->name('login');
Route::get('/login/valid','LoginController@validar')->name('validarlogin');

/** fin Inicio */

/**Menu */
Route::get('/menu/{id?}','LoginController@menu')->name('menu');
/** fin */

/** Jpanel*/
Route::get('/panel','LoginController@panel')->name('panel');
 /* Fin del jpnael*/

 //crudacademia
Route::post('/panel/addacademia','AcademiaController@addacademia')->name('crearacademia');
Route::get('/panel/editaracademia/{id}','AcademiaController@editar')->name('editaracademia');
Route::put('/panel/editaracademia/{id}','AcademiaController@updateacademia')->name('updateacademia');
Route::delete('/panel/delacademia/{id}','AcademiaController@delacademia')->name('eliminaracademia');
//fin del crud
/**Crud Docente */
Route::post('/panel/adddocente','DocenteController@adddocente')->name('creardocente');
Route::get('/panel/editardocente/{id}','DocenteController@editar')->name('editardocente');
Route::put('/panel/editardocente/{id}','DocenteController@update')->name('updatedocente');
Route::delete('/panel/deldocente/{id}','DocenteController@delete')->name('eliminardocente');
/**Fin del crud docente */
/**Crud jefes */
Route::post('/panel/addjefe','JefCarreraController@addjefe')->name('crearjefe');
Route::delete('/panel/deljefe/{id}','JefCarreraController@deljefe')->name('eliminarjefe');
Route::get('/panel/editarjefe/{id}','JefCarreraController@editar')->name('editarjefe');
Route::put('/panel/editarjefe/{id}','JefCarreraController@update')->name('updatejefe');
/**Fin del crud jefes */
/**crud acuerdo */
Route::post('/panel/addacuerdo','AcuerdoController@addacuerdo')->name('crearacuerdo');
Route::delete('/panel/delacuerdo/{id}','AcuerdoController@delacuerdo')->name('eliminaracuerdo');
Route::get('/panel/editaracuerdo/{id}','AcuerdoController@editar')->name('editaracuerdo');
Route::put('/panel/editaracuerdo/{id}','AcuerdoController@update')->name('updateacuerdo');

 /**Crud acuerdo fin */
/** Crud Juntas*/
Route::post('/panel/addjunta','JuntaController@addjunta')->name('crearjunta');
/**Fin del Crud de Juntas */


/**Crud Login */
Route::post('/panel/adduser','LoginController@adduser')->name('crearusuario');
/**Fin del crud  login */