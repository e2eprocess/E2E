<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>E2E - Seguimiento CX</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/netParticulares/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="js/netParticulares/peticiones.js"></script>
		<script type="text/javascript" src="js/netParticulares/cpu.js"></script>
	  <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
		<link rel="Stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/tablas.css">
		<link rel="Stylesheet" type="text/css" href="css/menu.css">
		<title>Informe Seguimiento CX</title>
	</head>
	<body>
		<header id="menu-header">
			<div id="cabecera">
					<div id="logo"><h>E2E -	Performance management</h></br>
						Informe seguimiento CX
			</div>
			<nav>
				<ul class="menu">
					<li><a href="net_particulares.php">Net Particulares</a></li>
					<li><a href="net_cash.php">NetCash</a></li>
					<li><a href="movil.php">Móvil</a></li>
					<li><a href="oficinas.php">Oficinas</a></li>
					<li><a>ASO</a>
						<ul>
							<li><a href="ASOParticulares.php">Net Particulares</a></li>
							<li><a href="ASOCash.php">Net Cash</a></li>
							<li><a href="ASOMovil.php">Móvil</a></li>
							<li><a href="ASOOficinas.php">Oficinas</a></li>
						</ul>
					</li>
					<li><a href="APX.php">APX</a></li>
				</ul>
			</nav>
		</header>

		<section id="contenedor">
			<header>Net Particulares</header>

			<fieldset>
				<div id="tiempoRespuesta" style="width: 50%; height: 350px; margin:1 auto;float:left"></div>
				<div id="peticiones" style="width: 50%; height: 350px; margin:1 auto;float:left"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
				<div id="cpu" style="width: 100%; height: 350px; margin:1 auto;float:left"></div>

			</fieldset>
		</section>
	</body>
</html>
