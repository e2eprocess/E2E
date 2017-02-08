<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link type="text/css" rel="Stylesheet"  href="/E2E/css/estilo.css">
    <link type="text/css" rel="stylesheet" href="/E2E/css/drop-down-menu.css">
    <link rel="Stylesheet" type="text/css" href="/E2E/css/menu.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/recurso_mensual.js"></script>
    <script type="text/javascript" src="../js/netCash/KYFB/recurso_semanal.js"></script>
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
			<div id="incluirPagina"></div>
		</header>

		<section id="contenedor">
			<div id="submenu"><a href="KYFB_comparativa.php">Comparativa</a> | <span class="activo">Informe</span></div>
			<header>KYFB - Módulo de firmas</header>

			<fieldset>
				<div id="aplicacion_semanal" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div id="aplicacion_mensual" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
        <div id="recurso_semanal" style="width: 50%; height: 500px; margin:1 auto;float:left"></div>
        <div id="recurso_mensual" style="width: 50%; height: 500px; margin:1 auto;float:left"></div>
			</fieldset>
		</section>
	</body>
</html>
