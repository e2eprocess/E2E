<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link href="css/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/oficinas/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="js/oficinas/peticiones.js"></script>
		<script type="text/javascript" src="js/oficinas/cpu.js"></script>
	  <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
		<script type="text/javascript">
				$(function(){
						// Indica el nombre del archivo a cargar
						$("#incluirPagina").load("/E2E/html/menu.html");
				});
		</script>
	</head>
	<body>
		<header id="menu-header">
			<div id="cabecera">
					<div id="logo"><h>E2E -	Performance management</h></br>
						Informe seguimiento
			</div>

			<div id="incluirPagina"></div>
		</header>

		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu"> Seguimiento | Informe </div>
			<header>Oficinas</header>

			<!-- Formulario gestión fechas -->
			<?php include("php/fechaToFrom.php"); ?>
			<form id="comparador" action='' method='post'>
				<label>Comparar el día </label>
				<input type="text" name="from" id="from" readonly="readonly" size="12" value="<?= $from ?>"/>
				<label>(F) con </label>
				<input type="text" name="to" id="to" readonly="readonly" size="12" value="<?= $to ?>"/>
				<label>(T)</label>
				<input type="submit" value="Comparar" name="consulta"/>
			</form>
			<script src="external/jquery/jquery.js"></script>
			<script src="js/fecha/jquery-ui.js"></script>
			<script src="js/fecha/calendario.js"></script>

			<!-- Dashboard métricas -->
			<fieldset>
				<div id="tiempoRespuesta" style="width: 50%; height: 350px; margin:1 auto;float:left"></div>
				<div id="peticiones" style="width: 50%; height: 350px; margin:1 auto;float:left"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
				<div id="cpu" style="width: 100%; height: 350px; margin:1 auto;float:left"></div>

			</fieldset>
		</section>
	</body>
</html>
