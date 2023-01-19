<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function loginUsuario(Request $request){
        $email = $request->get('email');
        $contrasenia = $request->get('contrasenia');

        if($usuario = Usuario::where('email', $email)->first()) {
            if(Hash::check($contrasenia, $usuario->contrasenia)) {
                if($usuario->rolID != 4) {
                    $this->setSesion($usuario->id, $usuario->rolID);
                    return redirect()->route('mainmenu');
                } else {
                    return back()->with('warning', 'No tiene los permisos necesarios para entrar en esta web.');
                }
            } else {
                return back()->with('warning', 'Contraseña incorrecta.');
            }
        } else {
            return back()->with('warning', 'No existe ningún usuario con ese email.');
        }
    }

    private function comprobarNuevaContrasenia($c1, $c2) {
        if(strlen($c1) < 8)
            return 'Su contraseña debe tener, al menos, 8 caracteres.';
        else if($c1 != $c2)
            return 'Las contraseñas deben coincidir.';

        return 'OK';
    }

    private function setSesion($usuarioID, $usuarioRolID) {
        session(['usuarioID' => $usuarioID, 'usuarioRolID' => $usuarioRolID]);
    }

    private function emptySession() {
        session()->forget('usuarioID');
        session()->forget('usuarioRolID');
    }

    public function  registroUsuario(Request $request) {
        $email = $request->get('email');

        // Si el email es válido
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Comprobamos que el email no esté registrado ya en el sistema.
            if(Usuario::where('email', $email)->first()) {
                $message = 'Ya existe un usuario con ese email.';
            } else {
                // Comprobamos que la contraseña sea óptima, es decir:
                //  - Tiene al menos 8 caracteres.
                //  - Las dos contraseñas coinciden
                $contrasenia  = $request->get('contrasenia');
                $contrasenia2 = $request->get('contrasenia2');
                $contrasenia_OK = $this->comprobarNuevaContrasenia($contrasenia, $contrasenia2);

                if($contrasenia_OK) {
                    $rol = $request->get('rol');

                    $newUsuario = array(
                        'email' => $email,
                        'contrasenia' => Hash::make($contrasenia),
                        'nombre' => $request->get('nombre'),
                        'telefono' => $request->get('telefono'),
                        'genero' => $request->get('genero'),
                        'rolID' => $rol
                    );

                    $newDBEntrance = new Usuario($newUsuario);
                    $newDBEntrance->save();

                    // Comprobamos que el usuario se ha introducido correctamente
                    if($usuario = Usuario::where('email', $email)->first()) {
                        // Si el usuario es de tipo tutor o psicólogo, se le inicia sesión automáticamente
                        if($rol == 2 || $rol == 3)
                            $this->setSesion($usuario->id, $usuario->rolID);

                        return redirect()->route('mainmenu');
                    } else {
                        $message = 'Se ha producido un error al introducir los datos en la base de datos.';
                    }
                } else {
                    $message = $contrasenia_OK;
                }
            }
        } else {
            $message = 'Debe insertar un correo electrónico válido.';
        }

        return back()->with('warning', $message);
    }

    public function cerrarSesion() {
        $this->emptySession();
        return redirect()->route('login');
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

    public function goToMainmenu() {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) return view('mainmenu');
        else return redirect()->route('login');
    }
}
