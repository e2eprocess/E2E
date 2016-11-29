<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link rel="Stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/tablas.css">
		<link rel="Stylesheet" type="text/css" href="css/menu.css">
    <link href="css/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/oficinas/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="js/oficinas/peticiones.js"></script>
		<script type="text/javascript" src="js/oficinas/cpu.js"></script>
	  <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
	</head>
	<body>
		<header id="menu-header">
			<div id="cabecera">
					<div id="logo"><h>E2E -	Performance management</h></br>
						Informe seguimiento
			</div>

			<!-- MENÚ -->
			<nav>
				<ul class="menu">
					<li><a href="net_particulares.php">Net Particulares</a>
					</li>
					<li><a href="net_cash.php">NetCash</a>
						<ul>
							<li><a href="net_cash/KYOP.php">KYOP-Portal</a></li>
							<li><a href="net_cash/KYGU.php">KYGU-Perfilado de usuarios</a></li>
							<li><a href="net_cash/KYOS.php">KYOS-Gestión de saldos</a></li>
							<li><a href="net_cash/KYFB.php">KYFB-Módulo de firmas</a></li>
							<li><a href="vision_maquina.php">Visión máquina</a></li>
						</ul>
					</li>
					<li><a href="movil.php">Móvil</a>
					</li>
					<li><a href="oficinas.php">Oficinas</a></li>
					<li><a>ASO</a>
						<ul>
							<li><a href="ASO/particulares.php">Net Particulares</a></li>
							<li><a href="ASO/cash.php">Net Cash</a></li>
							<li><a href="ASO/movil.php">Móvil</a></li>
							<li><a href="ASO/oficinas.php">Oficinas</a></li>
						</ul>
					</li>
					<li><a href="APX.php">APX</a></li>
				</ul>
			</nav>
		</header>

		<!-- Cuerpo informe -->
		<section id="contenedor">
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
