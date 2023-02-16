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

    public function editDestino(Request $request) {
        $id = $request->get('id');
        $nombre = $request->get('nombre');
        $descripcion = $request->get('descripcion');
        $clima = $request->get('clima');
        $situacion = $request->get('situacion');

        if(isset($id)) {
            if($destino = Destino::find($id)) {
                $destino->nombre = $nombre;
                $destino->descripcion = $descripcion;
                $destino->clima = $clima;
                $destino->situacion = $situacion;
                $destino->save();
            }
        } else {
            $newDestino = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'clima' => $clima,
                'situacion' => $situacion
            );

            $newDBEntrance = new Destino($newDestino);
            $newDBEntrance->save();
        }

        return redirect()->route('lista_destinos');
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

    public function getRandomDestino(Request $request) {
        /**
         * Por ahora, $request no sirve para nada, pero queda preparado para que en un futuro incluya información
         * sobre el usuario que solicita el nuevo Destino, para intentar que no se repitan los últimos que visitó.
         */
        $statusCode = 200;

        $destino = Destino::whereNotNull('datos_interes')->inRandomOrder()->first();

        return response()->json([
            'nombre' => $destino->nombre,
            'descripcion' => $destino->descripcion,
            'clima' => $destino->clima,
            'situacion' => $destino->situacion,
            'datos_interes' => $destino->datos_interes
        ], $statusCode);
    }

    /**
     * FUNCIONES DE NAVEGACIÓN
     */
    public function goToListaDestinos() {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) {
            $lista_destinos = Destino::all();
            return view('lista_destinos', ['lista_destinos' => $lista_destinos]);
        }
        else return redirect()->route('login');
    }

    public function goToEditarDestino(Request $request) {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) {
            $destinoID = $request->get('destino_id');

            if($destinoID) {
                $destino = Destino::find($destinoID);

                if($destino)
                    return view('editar_destino', ['datos_iniciales' => $destino]);
                else
                    return view('lista_destinos', ['lista_destinos' => Destino::all()]);
            } else {
                return view('editar_destino');
            }
        }
        else return redirect()->route('login');
    }
}
