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
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection