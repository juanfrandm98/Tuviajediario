@extends('base')

@section('titulo', 'Lista de Avisos')

@section('contenido')
    <div>
        <div>
            <h2>Lista de Avisos</h2>
        </div>

        @if(!empty($avisos))
            <div>
                <table class="tabla">
                    <tr>
                        <th>Jugador</th>
                        <th>Áreas Cognitivas</th>
                        <th>Fecha</th>
                        <th>¿Automático?</th>
                    </tr>

                    @foreach($avisos as $aviso)
                        <tr>
                            <td>{{$aviso->jugadorID}}</td>
                            <td>{{$aviso->areas_cognitivas}}</td>
                            <td>{{$aviso->fecha}}</td>
                            <td>
                                @if($aviso->automatico)
                                    Sí
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <a>Por suerte, aún no hay ningún aviso de posible deterioro cognitivo de sus jugadores.</a>
            <a>¡Siga animándoles a completar juegos diariamente para mayor seguridad!</a>
        @endif
    </div>
@endsection