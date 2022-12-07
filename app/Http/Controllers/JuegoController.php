<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

            //$newDBEntrance = new
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    public function getRandomJuego(Request $request)
    {
        return response('PROBANDO 2.0', 200)->header('Content-Type', 'text/plain');
    }

}
