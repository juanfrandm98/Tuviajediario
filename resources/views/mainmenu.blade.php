@extends('base')

@section('titulo', 'Menú Principal')

@section('contenido')
    <div id="menu_principal">
        <h2>Menú Principal</h2>

        <div id="opciones_menu_principal">
            <a href="{{route('lista_resultados')}}">Resultados de los tutelados</a>

            @if(session('usuarioRolID' != 2))
                <a href="{{route('lista_juegos')}}">Lista de Juegos</a>
                <a href="{{route('lista_areas_cognitivas')}}">Lista de Áreas Cognitivas</a>
            @endif

            @if(session('usuarioRolID' == 1))
                <a href="{{route('lista_destinos')}}">Lista de Destinos</a>
            @endif

            @if(session('usuarioRolID' == 1))
                <a href="{{route('registrar_otro_usuario')}}">Registrar Usuario</a>
            @else
                <a href="{{route('registrar_otro_usuario')}}">Registrar Jugador</a>
            @endif
        </div>
    </div>
@endsection