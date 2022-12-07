<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{

    public function getRandomJuego(Request $request)
    {
        return response('PROBANDO 2.0', 200)->header('Content-Type', 'text/plain');
    }

    public function pruebaPost(Request $request)
    {
        $jsonParams = $request->get('json');
        $message = 'Error en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $decoded = json_decode($jsonParams, true);
            $text = $decoded['saludo'];
            $message = 'He recibido: ' . $text;
            $statusCode = 200;
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

}
