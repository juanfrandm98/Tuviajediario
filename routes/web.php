<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JuegoController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\AreaCognitivaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;

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
Route::get('/', [UsuarioController::class, 'goToLogin'])->name('login');
Route::get('registro', [UsuarioController::class, 'goToRegistro'])->name('registro');
Route::get('/mainmenu', function() {
    return view('mainmenu');
})->name('mainmenu');
Route::get('goToListaJuegos', [JuegoController::class, 'goToListaJuegos'])->name('lista_juegos');
Route::get('goToListaDestinos', [DestinoController::class, 'goToListaDestinos'])->name('lista_destinos');
Route::get('goToListaAreasCognitivas', [AreaCognitivaController::class, 'goToListaAreasCognitivas'])->name('lista_areas_cognitivas');
Route::get('goToEditarJuego', [JuegoController::class, 'goToEditarJuego'])->name('editar_juego');
Route::get('goToEditarAreaCognitiva', [AreaCognitivaController::class, 'goToEditarAreaCognitiva'])->name('editar_area');
Route::get('goToEditarDestino', [DestinoController::class, 'goToEditarDestino'])->name('editar_destino');
/**
 * Rutas para los Juegos
 */
Route::get('addJuego', [JuegoController::class, 'addJuego']);
Route::get('editJuego', [JuegoController::class, 'editJuego'])->name('editJuego');
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
Route::get('editDestino', [DestinoController::class, 'editDestino'])->name('editDestino');
Route::get('addDatoInteres', [DestinoController::class, 'addDatoInteres']);
Route::get('getRandomDestino', [DestinoController::class, 'getRandomDestino']);
/**
 * Rutas para las Áreas Cognitivas
 */
Route::get('editAreaCognitiva', [AreaCognitivaController::class, 'editAreaCognitiva'])->name('editAreaCognitiva');
/**
 *  Rutas para los Usuarios
 */
Route::get('loginUsuario', [UsuarioController::class, 'loginUsuario'])->name('loginUsuario');
Route::get('registroUsuario', [UsuarioController::class, 'registroUsuario'])->name('registroUsuario');
/**
 * Rutas para los Roles
 */
Route::get('addRol', [RolController::class, 'addRol']);
/**
 * Ruta de PHP
 */
Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');
