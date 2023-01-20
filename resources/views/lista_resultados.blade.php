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
                    <th>Aviso</th>
                    <th>Fecha</th>
                </tr>

                @if(!empty($resultados))
                    @foreach($resultados as $resultado)
                        <tr>
                            <td>
                                @foreach($jugadores as $jugador)
                                    @if($resultado->jugadorID == $jugador->id)
                                        {{ucfirst($jugador->nombre)}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($juegos as $juego)
                                    @if($resultado->juegoID == $juego->id)
                                        {{ucfirst($juego->nombre)}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ucfirst($resultado->puntos)}}</td>
                            <td>{{ucfirst($resultado->segundos)}}</td>
                            <td>{{ucfirst($resultado->aviso)}}</td>
                            <td>{{ucfirst($resultado->fecha)}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection