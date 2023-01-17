@extends('base')

@section('titulo', 'Lista de Juegos')

@section('contenido')
    <div class="zona_lista_juegos">
        <div>
            <h2>Lista de Juegos</h2>
        </div>

        <div class="tabla_juegos">
            <table class="tabla">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Tipo</th>
                    <th>Cota Inf.</th>
                    <th>Área Cognitiva</th>
                    <th>Explicación</th>
                </tr>

                @if(!empty($lista_juegos))
                    @foreach($lista_juegos as $juego)
                        <tr>
                            <td>{{ucfirst($juego->id)}}</td>
                            <td>{{ucfirst($juego->nombre)}}</td>
                            <td>{{ucfirst($juego->codigo)}}</td>
                            <td>{{ucfirst($juego->tipo)}}</td>
                            <td>{{ucfirst($juego->cota_inferior)}}</td>
                            <td>{{ucfirst($juego->area_cognitiva)}}</td>
                            <td>{{ucfirst($juego->explicacion)}}</td>
                            <td>
                                <form method="get" action="{{route('editJuego')}}">
                                    <input type="hidden" id="juego_id" name="juego_id" value="{{$juego->id}}">
                                    <button type="submit">Editar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection