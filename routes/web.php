<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JuegoController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\DestinoController;

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
/**
 * Primera ruta de prueba
 */
Route::get('/testAlexa', function() {
	return response('PROBANDO', 200)->header('Content-Type', 'text/plain');
});
/**
 * Rutas para la página web
 */
Route::get('/', function() {
    return view('welcome');
});
Route::get('/mainmenu', function() {
    return view('mainmenu');
});
Route::get('goToListaJuegos', [JuegoController::class, 'goToListaJuegos'])->name('lista_juegos');
Route::get('goToListaDestinos', [DestinoController::class, 'goToListaDestinos'])->name('lista_destinos');
/**
 * Rutas para los Juegos
 */
Route::get('addJuego', [JuegoController::class, 'addJuego']);
Route::get('getRandomJuego', [JuegoController::class, 'getRandomJuego']);
Route::get('getAudioCampanada', [JuegoController::class, 'getAudioCampanada']);
/**
 * Rutas para los Resultados
 */
Route::get('addResultado', [ResultadoController::class, 'addResultado']);
Route::get('addResultado2', [ResultadoController::class, 'addResultado2']);
/**
 * Rutas para los Destinos
 */
Route::get('addDestino', [DestinoController::class, 'addDestino']);
Route::get('addDatoInteres', [DestinoController::class, 'addDatoInteres']);
Route::get('getRandomDestino', [DestinoController::class, 'getRandomDestino']);
/**
 * Ruta de PHP
 */
Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');
