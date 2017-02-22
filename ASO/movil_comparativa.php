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
		<script type="text/javascript" src="/E2E/js/ASO/movil/tiempo.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/cpu.js"></script>
	  <script type="text/javascript">
				$(function(){
						// Indica el nombre del archivo a cargar
						$("#incluirPagina").load("/E2E/html/menu.html");
				});
		</script>
	</head>
	<body>
		<header id="menu-header">
			<div id="incluirPagina"></div>
		</header>

		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu"> <span class="activo">Comparativa</span></div>
			<header>ASO - Móvil</header>

			<!-- Formulario gestión fechas -->
			<?php include("../php/fechaToFrom.php"); ?>
			<form id="comparador" action='' method='post'>
				<label>Comparar el día </label>
				<input type="text" name="from" id="from" readonly="readonly" size="12" value="<?= $from ?>"/>
				<label>(F) con </label>
				<input type="text" name="to" id="to" readonly="readonly" size="12" value="<?= $to ?>"/>
				<label>(T)</label>
				<input type="submit" value="Comparar" name="consulta"/>
			</form>
			<script src="/E2E/external/jquery/jquery.js"></script>
			<script src="/E2E/js/fecha/jquery-ui.js"></script>
			<script src="/E2E/js/fecha/calendario.js"></script>

			<!-- Dashboard métricas -->
			<fieldset id="recuadro">
				<div id="tiempoASOMovil"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesASOMovil"></div>
			</fieldset>
			<fieldset id="recuadroMemoria"style="height: 300px;">
				<div id="cpuASOMovil"></div>
			</fieldset>
		</section>
	</body>
</html>
