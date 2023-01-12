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

                @if(!empty($lista_destinos))
                    @foreach($lista_destinos as $destino)
                        <tr>
                            <td>{{ucfirst($destino->id)}}</td>
                            <td>{{ucfirst($destino->nombre)}}</td>
                            <td>{{ucfirst($destino->descripcion)}}</td>
                            <td>{{ucfirst($destino->clima)}}</td>
                            <td>{{ucfirst($destino->situacion)}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection