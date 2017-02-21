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
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/recurso_mensual.js"></script>
    <script type="text/javascript" src="/E2E/js/netParticulares/KQOF/recurso_semanal.js"></script>
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
			<div id="submenu"><a href="KQOF_comparativa.php">Comparativa</a> | <span class="activo">Informe</span></div>
			<header>KQOF - Frontal</header>

			<fieldset>
				<div id="aplicacion_semanal" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div id="aplicacion_mensual" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
        <div id="recurso_semanal" style="width: 50%; height: 270px; margin:1 auto;float:left"></div>
        <div id="recurso_mensual" style="width: 50%; height: 270px; margin:1 auto;float:left"></div>
			</fieldset>
		</section>
	</body>
</html>
