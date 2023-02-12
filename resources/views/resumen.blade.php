<html>
	<head>
	<style type="text/css"></style>
    <title> Desarrollo del Software &gt; Trabajo Fin de Máster | Universidad de Granada</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Universidad de Granada - Desarrollo del Software - ">
	<meta name="keywords" content="universidad,granada,Desarrollo del Software - ">
	<meta http-equiv="content-language" name="language" content="es">
    <link rel="shortcut icon" href="http://masteres.ugr.es/master-desarrollo-software/img/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="http://masteres.ugr.es/master-desarrollo-software/img/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" type="text/css" href="http://masteres.ugr.es/master-desarrollo-software/css/72faf47d7c792d5653b0deb18966de7f.css" media="all">
<style type="text/css" media="all"> li.model-banner-01 a.banner,li.model-banner-01 a.banner:hover{background-image:url(http://masteres.ugr.es/master-desarrollo-software/img/banners/banner-01.png)}
 li.model-resaltado-01 a.banner{background-image:url(http://masteres.ugr.es/master-desarrollo-software/img/banners/resaltado-01_off.png)}
li.model-resaltado-01 a.banner:hover{background-image:url(http://masteres.ugr.es/master-desarrollo-software/img/banners/resaltado-01_on.png)}
</style>

	<script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript">
		// URL relativa del index del sitio
		var ROOT_URI_PREFIX = "http://masteres.ugr.es/master-desarrollo-software";
	</script><style type="text/css"></style>

	<script type="text/javascript">
// <![CDATA[
console = {	log:function(){},	warn:function(){},	error:function(){}}// ]]>
</script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script><script type="text/javascript"> window.jQuery || document.write("\x3C"+"script type='text/javascript' src='/master-desarrollo-software/js/3rdpart/jquery-1.8.3.min.ALL.js'"+">\x3C/script\x3E")</script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script><script type="text/javascript"> window.jQuery.ui || document.write("\x3C"+"script type='text/javascript' src='/master-desarrollo-software/js/3rdpart/jquery-ui-1.10.3.min.ALL.js'"+">\x3C/script\x3E")</script>
<script type="text/javascript" src="http://masteres.ugr.es/master-desarrollo-software/cjs/3e6124e0f2255a5643f7278fd46b4889.js"></script>
<script type="text/javascript">
// <![CDATA[
$(document).ready(function(){
				if($.preloadCssImages){$.preloadCssImages({onlyMatchedDOMElements:true,simultaneousCacheLoading:2})};
			});
// ]]>
</script>

<script type="text/javascript">
// <![CDATA[
if(typeof(UNICMS)=== "undefined"){var UNICMS={}};

						(function(i,s,o,g,r,a,m){
							i['GoogleAnalyticsObject']=r;
							i[r]=i[r]||function(){
								(i[r].q=i[r].q||[]).push(arguments)
							},i[r].l=1*new Date();
							a=s.createElement(o), m=s.getElementsByTagName(o)[0];
							a.async=1;
							a.src=g;
							m.parentNode.insertBefore(a,m)
						})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
						ga('create', 'UA-17884644-1'); // Reemplazar por la propiedad ID.
						ga('send', 'pageview');

// ]]>
</script>


	<script type="text/javascript">
		//<![CDATA[
        // poner clase level1_primero y level1_ultimo a los ul.departamento li
        $(document).ready(function(){
            $("ul.departamento>li:first").addClass("level1_primero");
            $("ul.departamento>li:last").addClass("level1_ultimo");
        });

        // asignar clases a elementos pares e impares de los ul.departamento
        $(document).ready(function(){
            $("ul.departamento>li:even").addClass("impar");
            $("ul.departamento>li:odd").addClass("par");
        });

		// poner estilos a párrafos que sólo contienen una imagen para poder
		// eliminar bullet.
        $(document).ready(function(){
            $("p a.media:first-child img.mediacenter").parent().parent().addClass("imagen_aislada");
        });

		//]]>
    </script>
<style type="text/css">/* TREE LAYOUT */ .tree ul { margin:0 0 0 5px; padding:0 0 0 0; list-style-type:none; } .tree li { display:block; min-height:18px; line-height:18px; padding:0 0 0 15px; margin:0 0 0 0; /* Background fix */ clear:both; } .tree li ul { display:none; } .tree li a, .tree li span { display:inline-block;line-height:16px;height:16px;color:black;white-space:nowrap;text-decoration:none;padding:1px 4px 1px 4px;margin:0; } .tree li a:focus { outline: none; } .tree li a input, .tree li span input { margin:0;padding:0 0;display:inline-block;height:12px !important;border:1px solid white;background:white;font-size:10px;font-family:Verdana; } .tree li a input:not([class="xxx"]), .tree li span input:not([class="xxx"]) { padding:1px 0; } /* FOR DOTS */ .tree .ltr li.last { float:left; } .tree > ul li.last { overflow:visible; } /* OPEN OR CLOSE */ .tree li.open ul { display:block; } .tree li.closed ul { display:none !important; } /* FOR DRAGGING */ #jstree-dragged { position:absolute; top:-10px; left:-10px; margin:0; padding:0; } #jstree-dragged ul ul ul { display:none; } #jstree-marker { padding:0; margin:0; line-height:5px; font-size:1px; overflow:hidden; height:5px; position:absolute; left:-45px; top:-30px; z-index:1000; background-color:transparent; background-repeat:no-repeat; display:none; } #jstree-marker.marker { width:45px; background-position:-32px top; } #jstree-marker.marker_plus { width:5px; background-position:right top; } /* BACKGROUND DOTS */ .tree li li { overflow:hidden; } .tree > .ltr > li { display:table; } /* ICONS */ .tree ul ins { display:inline-block; text-decoration:none; width:16px; height:16px; } .tree .ltr ins { margin:0 4px 0 0px; } </style>
	</head>
	<body>
		<div id="pagina">

	            <h1 id="titulo_pagina"><span class="texto_titulo">Trabajo Fin de Máster</span></h1>
	            <div id="contenido" class="sec_interior">
	            	<div id="fondo-dialog" style="display: none;"></div>
	            	<div class="content_doku">
	            		<h2>Título del Proyecto</h2>
	            		<ul>
	            			<li class="level1"><div class="li"><strong>Autor:</strong> Juan Francisco Díaz Moreno </div></li>
	            			<li class="level1"><div class="li"><strong>Tutor/es:</strong> Francisco Luis Gutiérrez Vela y Patricia Paderewski Rodríguez </div></li>
	            			<li class="level1"><div class="li"><strong>Fecha de Lectura:</strong> 16/02/2023 </div></li>
	            			<li class="level1"><div class="li"><strong>Resumen: </strong> <p>Cada vez es más importante el uso de los asistentes virtuales en los entornos domésticos. Una de las actividades en las que podrían participar de forma interesante y productiva es en la reducción de la soledad en personas mayores. Por ejemplo, incluir pequeños juegos usando asistentes virtuales, mezclados con actividades de la vida diaria de un mayor, permitiría, además de aumentar la actividad de la persona, llevar un control de su deterioro cognitivo, y de esta forma poder detectar cuándo se debe actuar para reducir ese importante problema.

										El objetivo del proyecto es estudiar qué técnicas se usan para analizar los inicios del deterioro cognitivo en mayores y diseñar un conjunto de pequeños juegos que puedan ser integrados en un sistema de juego basado en asistentes virtuales. El sistema deberá proporcionar juegos a la persona de forma dinámica a la vez que mantiene información sobre su utilización informando a un cuidador o familiar sobre la evolución de la persona.</p></div></li>
	            			<li class="level1"><div class="li"><strong>Imagen:</strong> <p><img src="/resources/images/logo_tu_viaje_diario.png" alt="Logo de Mi Viaje Diario" /></p></div></li>
	            		</ul>

	            	</div>
	            </div>
	    </div>
	</body>
