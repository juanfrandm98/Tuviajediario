<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destino;

class DestinoController extends Controller
{
    public function addDestino(Request $request)
    {
        $jsonParams = $request->get('json');
        $message = 'Error en los datos enviados.';
        $statusCode = 409;

        if($jsonParams) {
            $jsonDestino = json_decode($jsonParams, true);

            $newDestino = array(
                'nombre' => $jsonDestino['nombre'],
                'descripcion' => $jsonDestino['descripcion'],
                'clima' => $jsonDestino['clima'],
                'situacion' => $jsonDestino['situacion']
            );

            $newDBEntrance = new Destino($newDestino);
            $newDBEntrance->save();

            if($destino = Destino::where('nombre', $jsonDestino['nombre'])->where('descripcion', $jsonDestino['descripcion'])->
                                   where('clima', $jsonDestino['clima'])->where('situacion', $jsonDestino['situacion'])->first()) {
                $message = 'Destino introducido correctamente (ID: ' . $destino->id . ').';
                $statusCode = 200;
            } else {
                $message = 'Error al introducir los datos en la BD.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    public function addDatoInteres(Request $request) {
        $destinoID = $request->get('destino');
        $jsonDatos = $request->get('datos');
        $message = 'No ha sido posible encontrar los datos.';
        $statusCode = 409;

        if($destinoID && $jsonDatos) {
            $newDatos = json_decode($jsonDatos, true);
            $destino = Destino::where('id', $destinoID)->first();

            if($destino) {
                $message = 'Los datos han sido actualizados correctamente.';
                $statusCode = 200;

                if(is_null($destino->datos_interes)) {
                    $destino->datos_interes = $newDatos;
                } else {
                    $oldArray = $destino->datos_interes;
                    $destino->datos_interes = array_merge($oldArray, $newDatos);
                }

                $destino->save();
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }
}
