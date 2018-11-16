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

	try{
		$bandas = (new App\banda)->bandas(); 
		$usuario = Auth::user(); 
	}catch(Exception $e){ 
		$bandas = [];
		$usuario = new App\usuario;
	}

    return view('welcome')->with([
    	'bandas' => $bandas,
    	'usuario' => $usuario
    ]);
});

Route::get('ensayos/{fecha}', 'EnsayoController@ensayos');
Route::post('ensayos/reservar', 'EnsayoController@store');

Auth::routes();

Route::resource(
	'bandas', 'BandaController');
Route::resource(
	'canciones', 'CancionController')->only(['store']);
