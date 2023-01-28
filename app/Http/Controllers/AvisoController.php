<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Usuario;

class AvisoController extends Controller
{
    public function goToListaAvisos() {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) {
            $lista_avisos = [];
            $tutor = Usuario::find('usuarioID');

            foreach ($tutor->avisos as $avisoID) {
                $aviso = Aviso::find($avisoID);
                if($aviso->activo)
                    $lista_avisos[$avisoID] = $aviso;
            }

            return view('lista_avisos', ['avisos' => $lista_avisos]);
        }

        return redirect()->route('login');
    }
}
