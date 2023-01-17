@extends('base')

@if(isset($datos_iniciales))
    @section('titulo', 'Editar Juego')
@else
    @section('titulo', 'Nuevo Juego')
@endif

@section('contenido')
    <div class="zona_edicion_juego">
        <h2>
            @if(isset($datos_iniciales))
                Editar Juego
            @else
                Nuevo Juego
            @endif
        </h2>

        <form class="form_edicion_juego" method="get" action="{{route('editJuego')}}">
            <label class="edit_label" for="nombre">Nombre del Juego:</label><br>
            <input type="text" name="nombre" id="nombre" class="small_text_input"
                   @if(isset($datos_iniciales)) value="{{$datos_iniciales->nombre}}" @endif>

            <label class="edit_label" for="codigo">Código:</label><br>
            <input type="text" name="codigo" id="codigo" class="small_text_input"
                   @if(isset($datos_iniciales)) value={{$datos_iniciales->codigo}} @endif><br><br>

            <label class="edit_label" for="explicacion">Explicación:</label><br>
            <textarea name="explicacion" class="big_text_input" id="explicacion">
                @if(isset($datos_iniciales)){{$datos_iniciales->explicacion}}@endif
            </textarea><br><br>

            <label class="edit_label" for="tipo">Tipo:</label><br>
            <select name="tipo" id="tipo">
                <option value="general">General</option>
                <option value="especifico">Específico</option>
            </select>

            <label class="edit_label" for="cota_inferior">Cota Inferdior (Puntos):</label><br>
            <input type="number" name="cota_inferior" id="cota_inferior" class="small_text_input"
                @if(isset($datos_iniciales)) value="{{$datos_iniciales->cota_inferior}}"@endif><br><br>
        </form>
    </div>
@endsection