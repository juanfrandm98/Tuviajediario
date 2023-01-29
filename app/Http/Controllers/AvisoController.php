<?php

namespace App\Http\Controllers;

use App\Models\AreaCognitiva;
use App\Models\Aviso;
use App\Models\Juego;
use App\Models\Resultado;
use App\Models\Usuario;

class AvisoController extends Controller
{
    public static function addAviso($resultadoID, $automatico) {
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

            foreach ($jugador->tutela as $tutorID) {
                $tutor = Usuario::find($tutorID);

                if(is_null($tutor->avisos)) {
                    $tutor->avisos = $avisoID;
                } else {
                    $oldArray = $tutor->avisos;
                    $tutor->avisos = array_merge($oldArray, $avisoID);
                }
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
            $nombre_areas = [];
            $nombre_jugadores = [];
            $tutor = Usuario::find($usuarioID);

            if(isset($tutor->avisos)) {
                foreach ($tutor->avisos as $avisoID) {
                    $aviso = Aviso::find($avisoID);
                    if($aviso->activo) {
                        $lista_avisos[$avisoID] = $aviso;
                    }
                }

                if(!empty($lista_avisos)) {
                    $jugadores = Usuario::where('rolID', 4)->all();
                    foreach ($jugadores as $jugador)
                        $nombre_jugadores[$jugador->id] = $jugador->nombre;

                    $areas = AreaCognitiva::all();
                    foreach ($lista_avisos as $aviso)
                        foreach ($aviso->areas_cognitivas as $areaID) {
                            if(isset($nombre_areas[$aviso->id])) {
                                $nombre_areas[$aviso->id] = $areas[$areaID]->nombre;
                            } else {
                                $oldArray = $nombre_areas[$avisoID];
                                $nombre_areas[$avisoID] = array_merge($oldArray, [$areas[$areaID]->nombre]);
                            }
                        }
                }
            }

            return view('lista_avisos', ['avisos' => $lista_avisos, 'jugadores' => $nombre_jugadores, 'areas' => $nombre_areas]);
        }

        return redirect()->route('login');
    }
}
