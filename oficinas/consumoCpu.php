<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link type="text/css" rel="stylesheet" href="/E2E/css/jquery-ui.css">
		<link type="text/css" rel="Stylesheet" href="/E2E/css/estilo.css">
		<link type="text/css" rel="stylesheet" href="/E2E/css/drop-down-menu.css">
		<link type="text/css" rel="Stylesheet" href="/E2E/css/menu.css">
		<script type="text/javascript" src="/E2E/js/library/highcharts.js"></script>
    <script type="text/javascript" src="/E2E/js/library/exporting.js"></script>
		<script type="text/javascript" src="/E2E/js/library/jquery.min.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/NCOC/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/NCOC/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/cpuParAll.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/cpuImparAll.js"></script>
	  <script type="text/javascript">
				$(function(){
						// Indica el nombre del archivo a cargar
						$("#incluirPagina").load("/E2E/html/menu.html");
				});
		</script>
		<script>
			function recarga(){
				location.href=location.href
			}
			setInterval('recarga()',300000)
		</script>
	</head>
	<body>
		<header id="menu-header">
			<div id="incluirPagina"></div>
		</header>

		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu"> <span class="activo">Comparativa </span></div>
			<header>Oficinas - Consumo de CPU</header>


			<!-- Dashboard métricas -->
			<fieldset id="recuadroMemoria">
				<div id="cpuParOfi"></div>
			</fieldset>
			<fieldset id="recuadroMemoria">
				<div id="cpuImparOfi"></div>
			</fieldset>
		</section>
	</body>
</html>
