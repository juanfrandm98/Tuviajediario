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
                            <td>{{ucfirst($resultado->jugadorID)}}</td>
                            <td>{{ucfirst($resultado->juegoID)}}</td>
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