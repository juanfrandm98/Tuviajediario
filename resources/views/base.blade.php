<html lang="es">
    <head>
        <title>@yield('titulo') - Tu Viaje Diario</title>
        <meta charset="utf-8">
        <link href="/public/css/app.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="header">
                <img class="header_icon" src="/resources/images/logo_tu_viaje_diario.png" alt="Logo de Tu Viaje Diario">

                <div class="menu_header">
                    <ul>
                        <li><a href="{{route('mainmenu')}}">Menú Principal</a></li>
                        <li><a href="{{route('cerrarSesion')}}">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="contenido">
            @yield('contenido')
        </div>

    </body>
</html>
