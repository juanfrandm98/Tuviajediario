<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use Nette\FileNotFoundException;

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

    public function editJuego(Request $request) {
        $id = $request->get('id');
        $nombre = $request->get('nombre');
        $explicacion = $request->get('explicaicon');
        $tipo = $request->get('tipo');
        $cota_inferior = $request->get('cota_inferior');
        $codigo = $request->get('codigo');

        if(isset($id)) {
            if($juego = Juego::find($id)) {
                $juego->nombre = $nombre;
                $juego->explicacion = $explicacion;
                $juego->tipo = $tipo;
                $juego->cota_inferior = $cota_inferior;
                $juego->codigo = $codigo;

                $juego->save();

                return redirect()->route('lista_juegos');
            }
        }
    }

    public function getRandomJuego(Request $request)
    {
        $message = 'Debe enviar como parámetro el tipo de juego que desea recibir.';
        $statusCode = 409;

        $tipoJuego = $request->get('tipo');

        if($tipoJuego) {
            //$juego = Juego::inRandomOrder()->where('tipo', $tipoJuego)->first();
            $juego = Juego::inRandomOrder()->whereNotIn('id', [1,4])->where('tipo', $tipoJuego)->first();

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
        $numCampanadas = $request->get('num');
        $message = 'Debe enviar como parámetro el número de campanadas que desea recibir.';
        $statusCode = 409;

        if($numCampanadas) {
            $filename = 'camp_' . $numCampanadas . '.mp3';
            $filePath = storage_path() . '/app/sonidos_camp/' . $filename;

            if(file_exists($filePath)) {
                return response()->file($filePath);
            } else {
                $message = 'No se encontró el archivo: ' . $filename;
            }

        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    /**
     * FUNCIONES DE NAVEGACIÓN
     */
    public function goToListaJuegos() {
        $lista_juegos = Juego::all();

        return view('lista_juegos', ['lista_juegos' => $lista_juegos]);
    }

    public function goToEditarJuego(Request $request) {
        $juegoID = $request->get('juego_id');

        if($juegoID) {
            $juego = Juego::find($juegoID);
            return view('editar_juego', ['datos_iniciales' => $juego]);
        } else {
            return view('lista_juegos', ['lista_juegos' => Juego::all()]);
        }
    }

}
