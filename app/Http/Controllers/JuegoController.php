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
        $jsonParams = $request->get('json');
        $message = 'Error en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonTipo = json_decode($jsonParams, true);
            $tipo = $jsonTipo['tipo'];

            $juego = Juego::where('tipo', $tipo)->random();

            if($juego) {
                $statusCode = 200;

                return response()->json([
                    'nombre' => $juego->nombre,
                    'descripcion' => $juego->descripcion
                ], $statusCode);
            } else {
                $message = 'No se ha encontrado ningún juego de tipo ' . $tipo . '.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

}
