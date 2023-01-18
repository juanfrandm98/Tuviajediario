<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaCognitiva;

class AreaCognitivaController extends Controller
{
    public function editAreaCognitiva(Request $request) {
        $id = $request->get('id');
        $nombre = $request->get('nombre');

        if(isset($id)) {
            if($area = AreaCognitiva::find($id)) {
                $area->nombre = $nombre;
                $area->save();
            }
        } else {
            $newArea = array(
                'nombre' => $nombre
            );

            $newDBEntrance = new AreaCognitiva($newArea);
            $newDBEntrance->save();
        }

        return redirect()->route('lista_juegos');
    }

    /**
     * FUNCIONES DE NAVEGACIÓN
     */
    public function goToListaAreasCognitivas() {
        $lista_areas = AreaCognitiva::all();

        return view('lista_areas_cognitivas', ['lista_areas' => $lista_areas]);
    }

    public function goToEditarAreaCognitiva(Request $request) {
        $areaID = $request->get('area_id');

        if($areaID) {
            $area = AreaCognitiva::find($areaID);

            if($area)
                return view('editar_area', ['datos_iniciales' => $area]);
            else
                return view('lista_areas_cognitivas', ['lista_areas' => AreaCognitiva::all()]);
        } else {
            return view('editar_area');
        }
    }
}
