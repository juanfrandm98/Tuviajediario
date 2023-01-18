@extends('base')

@if(isset($datos_iniciales))
    @section('titulo', 'Editar Área Cognitiva')
@else
    @section('titulo', 'Nueva Área Cognitiva')
@endif

@section('contenido')
    <div class="zona_edicion_juego">
        <h2>
            @if(isset($datos_iniciales))
                Editar Área Cognitiva
            @else
                Nueva Área Cognitiva
            @endif
        </h2>

        <form class="form_edicion_juego" method="get" action="{{route('editAreaCognitiva')}}">
            <label class="edit_label" for="nombre">Nombre del Juego:</label>
            <input type="text" name="nombre" id="nombre" class="small_text_input"
                   @if(isset($datos_iniciales)) value="{{$datos_iniciales->nombre}}" @endif>

            <input type="hidden" id="id" name="id"
                @if(isset($datos_iniciales)) value="{{$datos_iniciales->id}}" @endif>

            <button class="button" type="submit">Guardar</button>
        </form>

        <form method="get" action="{{route('lista_areas_cognitivas')}}">
            <button class="button" type="submit">Atrás</button>
        </form>
    </div>
@endsection