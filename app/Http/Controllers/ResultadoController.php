<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\Juego;

class ResultadoController extends Controller
{
    public function addResultado(Request $request) {
        $jsonParams = $_REQUEST['json'];
        //$jsonParams = $request->get('json');
        $message = 'Error: fallo en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonResult = json_decode($jsonParams, true);

            if($juego = Juego::where('codigo', $jsonResult['juego'])->first()) {
                $newResult = array(
                    'juegoID' => $juego->id,
                    'jugadorID' => $jsonResult['jugadorID'],
                    'fecha' => $jsonResult['fecha'],
                    'puntos' => $jsonResult['puntos'],
                    'segundos' => $jsonResult['segundos'],
                    'aviso' => false
                );

                $newDBEntrance = new Resultado($newResult);
                $newDBEntrance->save();

                if($resultado = Resultado::where('juegoID', $juego->id)->where('jugadorID', $jsonResult['jugadorID'])->
                                           where('fecha', $jsonResult['fecha'])->first()) {
                    $message = 'Resultado introducido correctamente (ID: ' . $resultado->id . ').';
                    $statusCode = 200;
                } else {
                    $message = 'Error: los datos no se introdujeron en la BD correctamente.';
                }
            } else {
                $message = 'Error: no existe ningún juego con el código ' . $jsonResult['juego'] . '.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    public function goToListaResultados(Request $request) {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) {
            $tutor = Usuario::find($usuarioID);
            $jugadores = Usuario::whereIn('id', $tutor->tutela)->get();
            $juegos = Juego::all();
            $resultados = Resultado::whereIn('jugadorID', $tutor->tutela)->orderBy('jugadorID', 'ASC')->orderBy('fecha', 'ASC')->get();
            return view('lista_resultados', ['resultados' => $resultados, 'jugadores' => $jugadores, 'juegos' => $juegos]);
        }
        else return redirect()->route('login');
    }
}