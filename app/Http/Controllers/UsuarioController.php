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

    public function loginSkill(Request $request) {
        $email = $request->get('email');
        $message = 'El email de su dispositivo no se ha enviado correctamente.';
        $statusCode = 409;

        if($email) {
            if($usuario = Usuario::where('email', $email)->first()) {
                if($usuario->rolID == 4) {
                    $statusCode = 200;
                    return response()->json([
                        'jugadorID' => $usuario->id,
                        'nombre' => $usuario->alias
                    ], $statusCode);
                } else {
                    $message = 'Lo siento, la skill es solo para jugadores. Inicie sesión en el dispositivo con el email de un jugador.';
                }
            } else {
                $message = 'No existe ningún jugador con ese email. Por favor, pide a un tutor que te registre desde la web tuviajediario punto es.';
            }
        }

        return response($message, $statusCode)->header('Content-Type', 'text/plain');
    }

    private function comprobarNuevaContrasenia($c1, $c2) {
        if(strlen($c1) < 8)
            return 'Su contraseña debe tener, al menos, 8 caracteres.';
        else if($c1 != $c2)
            return 'Las contraseñas deben coincidir.';

        return 'OK';
    }

    private function setSesion($usuarioID, $usuarioRolID) {
        session(['usuarioID' => $usuarioID]);
        session(['usuarioRolID' => $usuarioRolID]);

    }

    private function emptySession() {
        session()->forget('usuarioID');
        session()->forget('usuarioRolID');
    }

    private function addTutela($idtutor, $idjugador) {
        $tutor = Usuario::find($idtutor);
        $jugador = Usuario::find($idjugador);

        if($tutor && $jugador) {
            if(is_null($tutor->tutela)) {
                $tutor->tutela = array($jugador->id);
            } else {
                $oldArray = $tutor->tutela;
                $tutor->tutela = array_merge($oldArray, array($jugador->id));
                $tutor->tutela = array_unique($tutor->tutela);
            }

            $tutor->save();

            if(is_null($jugador->tutela)) {
                $jugador->tutela = array($tutor->id);
            } else {
                $oldArray = $jugador->tutela;
                $jugador->tutela = array_merge($oldArray, array($tutor->id));
                $jugador->tutela = array_unique($jugador->tutela);
            }

            $jugador->save();
        }
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

                    if($rol == 4) {
                        $datosExtra = array(
                            'alias' => $request->get('alias'),
                            'nombre_madre' => $request->get('nombre_madre')
                        );
                        $newUsuario = array_merge($newUsuario, $datosExtra);
                    }

                    $newDBEntrance = new Usuario($newUsuario);
                    $newDBEntrance->save();

                    // Comprobamos que el usuario se ha introducido correctamente
                    if($usuario = Usuario::where('email', $email)->first()) {
                        // Si el usuario es de tipo tutor o psicólogo, se le inicia sesión automáticamente
                        if($rol == 2 || $rol == 3)
                            $this->setSesion($usuario->id, $usuario->rolID);
                        elseif ($rol == 4)
                            $this->addTutela(session('usuarioID'), $usuario->id);

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

        if(isset($usuarioID)) {
            $usuario = Usuario::find($usuarioID);

            $nombres_avisos = [];
            $avisos = [];

            if(isset($usuario->avisos)) {
                foreach ($usuario->avisos as $aviso)
                    if($aviso->activo && !$aviso->leido) {
                        $jugador = Usuario::find($aviso->jugadorID);
                        $nombres_avisos[$aviso->id] = [$jugador->nombre];
                        $avisos[$aviso->id] = $aviso->id;
                    }
            }

            return view('mainmenu', ['nombres_avisos' => $nombres_avisos, 'avisos' => $avisos]);
        }

        return redirect()->route('login');
    }

    public function goToRegistrarOtroUsuario() {
        $usuarioID = session('usuarioID');

        if(isset($usuarioID)) return view('editar_usuario');
        else return redirect()->route('login');
    }
}
