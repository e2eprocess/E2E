<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link type="text/css" rel="Stylesheet"  href="/E2E/css/estilo.css">
    <link type="text/css" rel="stylesheet" href="/E2E/css/drop-down-menu.css">
    <link rel="Stylesheet" type="text/css" href="/E2E/css/menu.css">
		<link href="/E2E/css/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/highstock.js"></script>
		<script type="text/javascript">
				$(function(){
						// Indica el nombre del archivo a cargar
						$("#incluirPagina").load("/E2E/html/menu.html");
				});
		</script>
	</head>
	<body>
		<script src="https://code.highcharts.com/stock/highstock.js"></script>
		<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
		<header id="menu-header">
			<div id="cabecera">
					<div id="logo"><h>E2E -	Performance management</h></br>
						Informe seguimiento
			</div>
			<div id="incluirPagina"></div>
		</header>
		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu">
				<span class="activo">Seguimiento</span>
			</div>
			<header>Net Cash</header>
			<fieldset>
				<div id="container" style="height: 700px; min-width: 500px"></div>
			</fieldset>
		</section>
	</body>
</html>
