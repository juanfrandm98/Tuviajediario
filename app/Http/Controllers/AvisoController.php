<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Juego;
use App\Models\Resultado;
use App\Models\Usuario;

class AvisoController extends Controller
{
    public static function addAviso($resultadoID, $automatico) {
        /*
        $resultado = Resultado::find($resultadoID);
        $juego = Juego::find($resultado->juegoID);

        $now = date_create()->format('Y-m-d H:i:s');

        $newAviso = array(
            'jugadorID' => $resultado->jugadorID,
            'resultadoID' => $resultadoID,
            'areas_cognitivas' => $juego->areas_cognitivas,
            'fecha' => $now,
            'automatico' => $automatico,
            'leido' => false,
            'activo' => true
        );

        $newDBEntrance = new Aviso($newAviso);
        $newDBEntrance->save();

        if($aviso = Aviso::where('resultadoID', $resultadoID)->first()) {
            $jugador = Usuario::find($resultado->jugadorID);
            $avisoID = Array($aviso->id);

            foreach ($jugador->tutela as $tutor) {
                if(is_null($tutor->avisos)) {
                    $tutor->avisos = $avisoID;
                } else {
                    $oldArray = $tutor->avisos;
                    $tutor->avisos = array_merge($oldArray, $avisoID);
                }
                $tutor->save();
            }

            return true;
        } else
            return false;*/

        $resultado = Resultado::find($resultadoID);
        $jugador = Usuario::find($resultado->jugadorID);

        if(isset($resultado) && isset($jugador)) {
            foreach ($jugador->tutela as $tutor) {
                $tutor->avisos = json_encode([$jugador->id]);
                $tutor->save();
            }

            return true;
        }

        return false;
    }

    public function goToListaAvisos() {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) {
            $lista_avisos = [];
            $tutor = Usuario::find('usuarioID');

            if(isset($tutor->avisos)) {
                foreach ($tutor->avisos as $avisoID) {
                    $aviso = Aviso::find($avisoID);
                    if($aviso->activo)
                        $lista_avisos[$avisoID] = $aviso;
                }
            }

            return view('lista_avisos', ['avisos' => $lista_avisos]);
        }

        return redirect()->route('login');
    }
}
