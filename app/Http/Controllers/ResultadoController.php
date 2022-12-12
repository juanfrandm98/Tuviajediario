<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\Juego;

class ResultadoController extends Controller
{
    public function addResultado(Request $request) {
        $jsonParams = $request->get('json');
        $message = 'Error: fallo en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonResult = json_decode($jsonParams, true);

            if($juego = Juego::where('codigo', $jsonResult['juego'])) {
                $newResult = array(
                    'juegoID' => $juego->id,
                    'jugador' => $jsonResult['jugador'],
                    'fecha' => $jsonResult['fecha'],
                    'puntos' => $jsonResult['puntos'],
                    'segundos' => $jsonResult['segundos'],
                    'aviso' => false
                );

                $newDBEntrance = new Resultado($newResult);
                $newDBEntrance->save();

                if($resultado = Resultado::where('juegoID', $jsonResult['juegoID'])->where('jugador', $jsonResult['jugador'])->
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
}