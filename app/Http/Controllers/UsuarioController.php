<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function loginUsuario(Request $request)
    {

    }

    public function  registroUsuario(Request $request) {

    }

    /**
     * FUNCIONES DE NAVEGACIÓN
     */
    public function goToLogin() {
        return view('login');
    }

    public function goToRegistro() {
        return view('registro');
    }
}
