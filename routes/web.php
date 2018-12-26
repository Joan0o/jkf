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

Route::get('/', 'Controller@principal');

Route::any('bandasusu', 'Controller@bandasusu');
Route::get('ensayos/{fecha}', 'EnsayoController@ensayos');
Route::post('ensayos/reservar', 'EnsayoController@store');
Route::post('ensayos/{id}', 'EnsayoController@cancelarEnsayo');
Route::put('ensayos/{id}', 'EnsayoController@Editar');
Route::get('ensayos/cancelar/{$id}', 'Controller@cancelar_ensayo');

Auth::routes();

Route::resource('bandas', 'BandaController');
Route::post('bandas/{banda_id}/integrantes/nuevo/{id}', 'BandaController@nuevo_integrante');
Route::resource('canciones', 'CancionController')->only(['store']);
Route::resource('cursos', 'CursoController');
Route::get('curso/buscar', 'CursoController@buscar');

Route::post('usuario/{id}', 'UsuarioController@update')->name('usuario.update');

Route::get('admin', 'AdminController@index');

Route::get('dashboard', 'AdminController@dashboard')->middleware('admin');

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function() {
        Route::get('/', 'AdminController@index');

        Route::resource('cursos', 'CursoController');
    });
});
