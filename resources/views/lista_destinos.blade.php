@extends('base')

@section('titulo', 'Lista de Destinos')

@section('contenido')
    <div>
        <div>
            <h2>Lista de Destinos</h2>
        </div>

        <div>
            <table class="tabla">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Clima</th>
                    <th>Situación</th>
                </tr>

                @if(!empty($lista_juegos))
                    @foreach($lista_juegos as $juego)
                        <tr>
                            <td>{{ucfirst($juego->id)}}</td>
                            <td>{{ucfirst($juego->nombre)}}</td>
                            <td>{{ucfirst($juego->descripcion)}}</td>
                            <td>{{ucfirst($juego->clima)}}</td>
                            <td>{{ucfirst($juego->situacion)}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection