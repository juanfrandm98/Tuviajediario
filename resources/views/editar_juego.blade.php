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
            <div class="row">
                <div class="column2">
                    <label class="edit_label" for="nombre">Nombre del Juego:</label>
                    <input type="text" name="nombre" id="nombre" class="small_text_input"
                           @if(isset($datos_iniciales)) value="{{$datos_iniciales->nombre}}" @endif>
                </div>
                <div class="column2">
                    <label class="edit_label" for="codigo">Código:</label>
                    <input type="text" name="codigo" id="codigo" class="small_text_input"
                           @if(isset($datos_iniciales)) value={{$datos_iniciales->codigo}} @endif><br><br>
                </div>
            </div>

            <label class="edit_label" for="explicacion">Explicación:</label><br>
            <textarea name="explicacion" class="big_text_input" id="explicacion">
                @if(isset($datos_iniciales)){{$datos_iniciales->explicacion}}@endif
            </textarea><br><br>

            <div class="row">
                <div class="column2">
                    <label class="edit_label" for="tipo">Tipo:</label>
                    <select name="tipo" id="tipo">
                        <option value="general">General</option>
                        <option value="especifico"
                                @if(isset($datos_iniciales) && ($datos_iniciales->tipo == 'especifico'))
                                    selected="selected"
                                @endif>Específico</option>
                    </select>
                </div>
                <div class="column2">
                    <label class="edit_label" for="cota_inferior">Cota Inferdior (Puntos):</label>
                    <input type="number" name="cota_inferior" id="cota_inferior" class="small_text_input"
                           @if(isset($datos_iniciales)) value="{{$datos_iniciales->cota_inferior}}"@endif><br><br>
                </div>
            </div>

            <div>
                <table class="tabla">
                    @if(!empty($areas))
                        <tr>
                            @foreach($areas as $area)
                                <td>
                                    <label><input type="checkbox" id="{{$area->id}}_check" name="{{$area->id}}_check"
                                        @if(in_array($area->id,$datos_iniciales->areas_cognitivas)) checked @endif>
                                        {{$area->nombre}}
                                    </label>
                                </td>
                            @endforeach
                        </tr>
                    @endif
                </table>
            </div>

            <input type="hidden" id="id" name="id"
                @if(isset($datos_iniciales)) value="{{$datos_iniciales->id}}" @endif>

            <button class="button" type="submit">Guardar</button>
        </form>

        <form method="get" action="{{route('lista_juegos')}}">
            <button class="button" type="submit">Atrás</button>
        </form>
    </div>
@endsection