@extends('base')

@if(isset($datos_iniciales))
    @section('titulo', 'Editar Usuario')
@else
    @section('titulo', 'Registrar usuario')
@endif

@section('contenido')
    <div class="zona_edicion_juego">
        <h2>
            @if(isset($datos_iniciales))
                Editar Usuario
            @else
                Registrar Usuario
            @endif
        </h2>

        <form class="form_edicion_juego" method="get" action="{{route('registroUsuario')}}">
            <label class="edit_label" for="email">Email del Usuario:</label>
            <input type="text" name="email" id="email" class="small_text_input"><br><br>

            <label class="edit_label" for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" id="nombre" class="small_text_input"><br><br>

            <label class="edit_label" for="telefono">Teléfono:</label>
            <input type="number" name="telefono" id="telefono" class="small_text_input"><br><br>

            <label class="edit_label" for="genero">Género:</label>
            <select name="genero" id="genero">
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
                <option value="otro">Otro</option>
            </select><br><br>

            <div class="row">
                <div class="column2">
                    <label class="edit_label" for="nombre_madre">Nombre de su madre:</label>
                    <input type="text" name="nombre_madre" id="nombre_madre" class="small_text_input">
                </div>

                <div class="column2">
                    <label class="edit_label" for="alias">Nombre con el que será tratado:</label>
                    <input type="text" name="alias" id="alias" class="small_text_input">
                </div>
            </div><br><br>

            <input type="hidden" id="rolID" name="rolID" value="4">

            <button class="button" type="submit">Guardar</button>
        </form>

        <form method="get" action="{{route('mainmenu')}}">
            <button class="button" type="submit">Atrás</button>
        </form>
    </div>
@endsection