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
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/memoria.js"></script>
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
			setInterval('recarga()',60000)
		</script>
	</head>
	<body>
		<header id="menu-header">
			<div id="incluirPagina"></div>
		</header>

		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu"> <span class="activo">Comparativa</span> | <a href="KYOS_informe.php">Informe</a> </div>

			<header>KYOS - Gestión de saldos</header>

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
			<script src="../external/jquery/jquery.js"></script>
			<script src="../js/fecha/jquery-ui.js"></script>
			<script src="../js/fecha/calendario.js"></script>

			<!-- Dashboard métricas -->
			<fieldset id="recuadro">
				<div id="tiempoRespuesta"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticiones"></div>
			</fieldset>
			<fieldset id="recuadroCpu">
				<div id="cpu"></div>
			</fieldset>
			<fieldset id="recuadroMemoria">
				<div id="memoria"></div>
			</fieldset>
		</section>
	</body>
</html>
