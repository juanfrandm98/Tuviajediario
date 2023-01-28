@extends('base')

@section('titulo', 'Resultados de los jugadores')

@section('contenido')
    <div class="zona_lista_juegos">
        <div>
            <h2>Lista de Resultados de tus tutelados</h2>
        </div>

        <div class="tabla_juegos">
            <table class="tabla">
                <tr>
                    <th>Jugador</th>
                    <th>Juego</th>
                    <th>Puntos</th>
                    <th>Tiempo (segundos)</th>
                    <th>¿Necesitaría seguimiento?</th>
                    <th>Fecha</th>
                </tr>

                @if(!empty($resultados))
                    @foreach($resultados as $resultado)
                        <tr>
                            <td>{{$jugadores[$resultado->jugadorID]}}</td>
                            <td>{{$juegos[$resultado->juegoID]}}</td>
                            <td>{{$resultado->puntos}}</td>
                            <td>{{$resultado->segundos}}</td>
                            @if($resultado->aviso)
                                <td class="celda_aviso">SI</td>
                            @else
                                <td>No</td>
                            @endif
                            <td>{{$resultado->fecha}}</td>

                            @if($usuarioRolID == 1 || $usuarioRolID == 3)
                                <td>
                                    <form method="get" action="{{route('editar_juego')}}">
                                        <input type="hidden" id="resultado_fecha" name="resultado_fecha" value="{{$resultado->fecha}}">
                                        <input type="hidden" id="resultado_jugador_id" name="resultado_jugador_id" value="{{$resultado->jugadorID}}">
                                        <input type="hidden" id="resultado_id" name="resultado_id" value="{{$resultado->id}}">
                                        <button type="submit">
                                            @if($resultado->aviso)
                                                Desactivar aviso
                                            @else
                                                Activar aviso
                                            @endif
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection