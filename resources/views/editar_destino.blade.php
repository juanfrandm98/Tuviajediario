@extends('base')

@if(isset($datos_iniciales))
    @section('titulo', 'Editar Destino')
@else
    @section('titulo', 'Nuevo Destino')
@endif

@section('contenido')
    <div class="zona_edicion_juego">
        <h2>
            @if(isset($datos_iniciales))
                Editar Destino
            @else
                Nuevo Destino
            @endif
        </h2>

        <form class="form_edicion_juego" method="get" action="{{route('editDestino')}}">
            <label class="edit_label" for="nombre">Nombre del Destino:</label>
            <input type="text" name="nombre" id="nombre" class="small_text_input"
                   @if(isset($datos_iniciales)) value="{{$datos_iniciales->nombre}}" @endif><br><br>

            <label class="edit_label" for="descripcion">Descripción:</label><br>
            <textarea name="descripcion" class="big_text_input" id="descripcion">
                @if(isset($datos_iniciales)){{$datos_iniciales->descripcion}}@endif
            </textarea><br><br>

            <div class="row">
                <div class="column2">
                    <label class="edit_label" for="clima">Clima:</label>
                    <select name="clima" id="clima">
                        <option value="caliente">Caliente</option>
                        <option value="frio"
                                @if(isset($datos_iniciales) && ($datos_iniciales->clima == 'frio'))
                                    selected="selected"
                                @endif>Frío</option>
                    </select>
                </div>
                <div class="column2">
                    <label class="edit_label" for="situacion">Situación:</label>
                    <select name="situacion" id="situacion">
                        <option value="interior">Interior</option>
                        <option value="costa"
                                @if(isset($datos_iniciales) && ($datos_iniciales->situacion == 'costa'))
                                    selected="selected"
                                @endif>Costa</option>
                    </select>
                </div>
            </div>

            <input type="hidden" id="id" name="id"
                @if(isset($datos_iniciales)) value="{{$datos_iniciales->id}}" @endif>

            <button class="button" type="submit">Guardar</button>
        </form>

        <form method="get" action="{{route('lista_destinos')}}">
            <button class="button" type="submit">Atrás</button>
        </form>
    </div>
@endsection