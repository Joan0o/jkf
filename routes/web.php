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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ensayos/{fecha}', 'EnsayoController@ensayos');
Route::post('ensayos/reservar', 'EnsayoController@store');

Auth::routes();

Route::resource('bandas', 'BandaController');
Route::resource('canciones', 'CancionController')->only(['store']);
Route::resource('cursos', 'CursoController');

Route::post('usuario/{id}', 'UsuarioController@update')->name('usuario.update');

Route::get('admin', 'AdminController@index');

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function() {
        Route::get('/', 'AdminController@index');

        Route::resource('cursos', 'CursoController');
    });
});