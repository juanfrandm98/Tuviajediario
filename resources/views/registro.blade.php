@extends('base_login')

@section('titulo', 'Nuevo usuario')

@section('contenido')
    <div class="login_background">
        <div class="login">
            <img src="/resources/images/logo_tu_viaje_diario.png" alt="Logo de Tu Viaje Diario" class="login_icon">

            <h1>Tu Viaje Diario</h1>

            <h2>Registro</h2>

            <div>
                @include('flash-message')
                @yield('content')
            </div>

            <form method="get" action="{{route('registroUsuario')}}" class="login_form">
                <label class="edit_label" for="email">Email:</label>
                <input type="text" name="email" id="email" class="small_text_input"><br><br>

                <label class="edit_label" for="contrasenia">Contraseña:</label>
                <input type="password" name="contrasenia" id="contrasenia" class="small_text_input"><br><br>

                <label class="edit_label" for="contrasenia2">Repite la contraseña:</label>
                <input type="password" name="contrasenia2" id="contrasenia2" class="small_text_input"><br><br>

                <label class="edit_label" for="nombre">Nombre completo:</label>
                <input type="text" name="nombre" id="nombre" class="small_text_input"><br><br><br>

                <label class="edit_label" for="telefono">Teléfono:</label>
                <input type="number" name="telefono" id="telefono" class="small_text_input"><br><br>

                <div class="row">
                    <div class="column2">
                        <label class="edit_label" for="genero">Género:</label>
                        <select name="genero" id="genero">
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <div class="column2">
                        <label class="edit_label" for="rol">Rol:</label>
                        <select name="rol" id="rol">
                            <option value=2>Tutor</option>
                            <option value=3>Psicólogo</option>
                        </select>
                    </div>
                </div>

                <button class="button" type="submit">Login</button>
            </form>

            <a href="{{route('login')}}" class="enlace">¿Ya estás registrado? ¡Haz login!</a>
        </div>
    </div>
@endsection