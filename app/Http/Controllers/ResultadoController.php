<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;
use App\Models\Juego;

class ResultadoController extends Controller
{
    public function addResultado2(Request $request) {
        $jsonParams = $request->get('json');
        $message = 'Error: fallo en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonResult = json_decode($jsonParams, true);

            if($juego = Juego::where('codigo', $jsonResult['juego'])->first()) {
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

                if($resultado = Resultado::where('juegoID', $juego->id)->where('jugador', $jsonResult['jugador'])->
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

    public function addResultado(Request $request)
    {
        $codigo   = $request->get('codigo');
        $jugador  = $request->get('jugador');
        $fecha    = $request->get('fecha');
        $puntos   = $request->get('puntos');
        $segundos = $request->get('segundos');

        $message = 'ERROR: Fallo en los datos enviados.';
        $statusCode = 409;

        if($codigo && $jugador && $fecha && $puntos && $segundos) {
            if($juego = Juego::where('codigo', $codigo)->first()) {
                $newResult = array(
                    'juegoID'  => $juego->id,
                    'jugador'  => $jugador,
                    'fecha'    => $fecha,
                    'puntos'   => $puntos,
                    'segundos' => $segundos,
                    'aviso'    => false
                );

                $newDBEntrance = new Resultado($newResult);
                $newDBEntrance->save();

                if($resultado = Resultado::where('juegoID', $juego->id)->where('jugador', $jugador)->
                                           where('fecha', $fecha)->first()) {
                    $message = 'Resultado introducido correctamente (ID: ' . $resultado->id . ').';
                    $statusCode = 200;
                } else {
                    $message = 'ERROR: Los datos no se introdujeron en la BD correctamente.';
                }
            } else {
                $message = 'ERROR: No existe ningún juego con el código ' . $codigo . '.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }
}