<html lang="es">
    <head>
        <title>@yield('titulo') - Tu Viaje Diario</title>
        <meta charset="utf-8">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @yield('contenido')
    </body>
</html>
