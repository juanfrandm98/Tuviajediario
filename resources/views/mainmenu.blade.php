@extends('base')

@section('titulo', 'Menú Principal')

@section('contenido')
    <div id="menu_principal">
        <h2>Menú Principal</h2>

        @if(isset($avisos))
            <div id="aviso_deterioro">
                <h3>¡Nuevo aviso de posible deterioro cognitivo!</h3>

                @if(count($avisos) > 1)
                    <p>Los siguientes usuarios tienen nuevos avisos de posible deterioro cognitivo:</p>
                @else
                    <p>El siguiente usuario tiene un nuevo aviso de posible deterioro cognitivo:</p>
                @endif

                <ul>
                    @foreach($nombres_avisos as $nombre)
                        <li>{{ucfirst($nombre)}}</li>
                    @endforeach
                </ul>

                <form method="get" action="{{route('leer_avisos')}}">
                    <input type="hidden" id="avisos" name="avisos" value={{json_encode($avisos)}}>
                    <button type="submit">He leído esta advertencia</button>
                </form>
            </div>
        @endif

        <div id="opciones_menu_principal">
            <a href="{{route('lista_resultados')}}">Resultados de los tutelados</a>

            @if(session('usuarioRolID') != 3)
                <a href="{{route('lista_avisos')}}">Lista de avisos</a>
            @endif

            @if(session('usuarioRolID') != 2)
                <a href="{{route('lista_juegos')}}">Lista de Juegos</a>
                <a href="{{route('lista_areas_cognitivas')}}">Lista de Áreas Cognitivas</a>
            @endif

            @if(session('usuarioRolID') == 1)
                <a href="{{route('lista_destinos')}}">Lista de Destinos</a>
                <a href="{{route('registrar_otro_usuario')}}">Registrar Usuario</a>
            @else
                <a href="{{route('registrar_otro_usuario')}}">Registrar Jugador</a>
            @endif
        </div>
    </div>
@endsection