<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{

    public function addJuego(Request $request)
    {
        $jsonParams = $request->get('json');
        $message = 'Error en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonJuego = json_decode($jsonParams, true);

            $newJuego = array(
                'nombre' => $jsonJuego['nombre'],
                'codigo' => $jsonJuego['codigo'],
                'explicacion' => $jsonJuego['explicacion'],
                'tipo' => $jsonJuego['tipo']
            );

            $newDBEntrance = new Juego($newJuego);
            $newDBEntrance->save();

            if($juego = Juego::where('nombre', $jsonJuego['nombre'])->where('explicacion', $jsonJuego['explicacion'])->first()) {
                $message = 'Juego introducido correctamente (ID: ' . $juego->id . ').';
                $statusCode = 200;
            } else {
                $message = 'Error al introducir los datos en la BD.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    public function getRandomJuego(Request $request)
    {
        $message = 'Debe enviar como parámetro el tipo de juego que desea recibir.';
        $statusCode = 409;

        $tipoJuego = $request->get('tipo');

        if($tipoJuego) {
            $juego = Juego::inRandomOrder()->where('tipo', $tipoJuego)->first();

            if($juego) {
                $statusCode = 200;

                return response()->json([
                    'nombre' => $juego->nombre,
                    'codigo' => $juego->codigo,
                    'explicacion' => $juego->explicacion
                ], $statusCode);
            } else {
                $message = 'No se ha encontrado ningún juego de tipo ' . $tipoJuego . '.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    public function getAudioCampanada(Request $request) {

    }

}
