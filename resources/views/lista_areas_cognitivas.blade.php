@extends('base')

@section('titulo', 'Lista de Áreas Cognitivas')

@section('contenido')
    <div>
        <div>
            <h2>Lista de Áreas Cognitivas</h2>
        </div>

        <div>
            <table class="tabla">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>

                @if(!empty($lista_areas))
                    @foreach($lista_areas as $area)
                        <tr>
                            <td>{{ucfirst($area->id)}}</td>
                            <td>{{ucfirst($area->nombre)}}</td>

                            <td>
                                <form method="get" action="{{route('editar_area')}}">
                                    <input type="hidden" id="area_id" name="juego_id" value="{{$area->id}}">
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