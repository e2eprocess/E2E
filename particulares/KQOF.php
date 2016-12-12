<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link rel="Stylesheet" type="text/css" href="../css/estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/tablas.css">
		<link rel="Stylesheet" type="text/css" href="../css/menu.css">
		<link href="../css/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="../js/netParticulares/KQOF/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="../js/netParticulares/KQOF/peticiones.js"></script>
		<script type="text/javascript" src="../js/netParticulares/KQOF/cpu.js"></script>
    <script type="text/javascript" src="../js/netParticulares/KQOF/memoria.js"></script>
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
					<li><a href="../net_particulares.php">Net Particulares</a>
						<ul>
							<li><a href="KQOF.php">KQOF-Frontal</a></li>
							<li><a href="ENPS.php">ENPS-Servicios multicanal</a></li>
							<li><a href="ESMB.php">ESMB-Servicios básicos </a></li>
							<li><a href="vision_maquina.php">Visión Máquina</a></li>
						</ul>
					</li>
					<li><a href="../net_cash.php">NetCash</a>
						<ul>
							<li><a href="KYOP.php">KYOP-Portal</a></li>
							<li><a href="KYGU.php">KYGU-Perfilado de usuarios</a></li>
							<li><a href="KYOS.php">KYOS-Gestión de saldos</a></li>
							<li><a href="KYFB.php">KYFB-Módulo de firmas</a></li>
							<li><a href="vision_maquina.php">Visión máquina</a></li>
						</ul>
					</li>
					<li><a href="../movil.php">Móvil</a>
					</li>
					<li><a>Oficinas</a>
						<ul>
							<li><a href="../oficinas/EECC.php">Escenario comerciales</a></li>
							<li><a href="../oficinas/NCOC.php">Objeto cliente</a></li>
						</ul>
					</li>
					<li><a>ASO</a>
						<ul>
							<li><a href="../ASO/particulares.php">Net Particulares</a></li>
							<li><a href="../ASO/cash.php">Net Cash</a></li>
							<li><a href="../ASO/movil.php">Móvil</a></li>
							<li><a href="../ASO/oficinas.php">Oficinas</a></li>
						</ul>
					</li>
					<li><a href="../APX.php">APX</a></li>
				</ul>
			</nav>
		</header>

		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu"> <span class="activo">Seguimiento </span> | <a href="KQOF_informe.php">Informe</a> </div>

			<header>KQOF - Módulo de firmas</header>
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
			<fieldset>
				<div id="tiempoRespuesta" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div id="peticiones" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
				<div id="cpu" style="width: 100%; height: 350px; margin:1 auto;float:left"></div>
				<div id="memoria" style="width: 100%; height: 350px; margin:1 auto;float:left"></div>
			</fieldset>
		</section>
	</body>
</html>
