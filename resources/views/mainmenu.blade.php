@extends('base')

@section('titulo', 'Menú Principal')

@section('contenido')
    <div id="menu_principal">
        <h2>Menú Principal</h2>

        <div id="opciones_menu_principal">
            <a href="{{route('lista_juegos')}}">Lista de Juegos</a>
            <a href="{{route('lista_destinos')}}">Lista de Destinos</a>
            <a href="{{route('lista_areas_cognitivas')}}">Lista de Áreas Cognitivas</a>
        </div>
    </div>
@endsection