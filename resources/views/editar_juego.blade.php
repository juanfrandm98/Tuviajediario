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
                   @if(isset($datos_iniciales)) value="{{ucfirst($datos_iniciales->nombre)}}" @endif><br><br>
        </form>
    </div>
@endsection