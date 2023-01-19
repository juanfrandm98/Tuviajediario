@extends('base')

@section('titulo', 'Menú Principal')

@section('contenido')
    <div id="menu_principal">
        <h2>Menú Principal</h2>

        <div id="opciones_menu_principal">
            <a href="{{route('lista_juegos')}}">Lista de Juegos</a>
            <a href="{{route('lista_destinos')}}">Lista de Destinos</a>
            <a href="{{route('lista_areas_cognitivas')}}">Lista de Áreas Cognitivas</a>
            <a href="{{route('registrar_otro_usuario')}}">Registrar Jugador</a>
            <input type="hidden" id="tutor" name="tutor" value=1>
            <input type="hidden" id="jugador" name="jugador" value=2>
            <a href="{{route('addTutelaa')}}">Tutela</a>
        </div>
    </div>
@endsection