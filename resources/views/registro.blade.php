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

                <button class="button" type="submit">Login</button>
            </form>

            <a href="{{route('login')}}" class="enlace">¿Ya estás registrado? ¡Haz login!</a>
        </div>
    </div>
@endsection