<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{

    public function getRandomJuego(Request $request)
    {
        return response('PROBANDO 2.0', 200)->header('Content-Type', 'text/plain');
    }

}
