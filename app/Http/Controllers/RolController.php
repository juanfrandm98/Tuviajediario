<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function addRol(Request $request)
    {
        $jsonParams = $request->get('json');
        $message = 'Error en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonRol = json_decode($jsonParams, true);

            $newRol = array(
                'nombre' => $jsonRol['nombre'],
                'descripcion' => $jsonRol['descripcion']
            );

            $newDBEntrance = new Rol($newRol);
            $newDBEntrance->save();

            if($rol = Rol::where('nombre', $jsonRol['nombre'])->where('descripcion', $jsonRol['descripcion'])->first()) {
                $message = 'Rol introducido correctamente (ID: ' . $rol->id . ').';
                $statusCode = 200;
            } else {
                $message = 'Error al introducir los datos en la BD.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }
}
