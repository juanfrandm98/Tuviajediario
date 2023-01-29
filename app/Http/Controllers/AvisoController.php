<?php

namespace App\Http\Controllers;

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

        if($aviso = Aviso::where('resultadoID', $resultadoID)->first())
            return true;
        else
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
