<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/movil/VS_MQ/recurso_semanal.js"></script>
		<script type="text/javascript" src="../js/movil/VS_MQ/recurso_mensual.js"></script>
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
						Informe aplicaciones / recursos
			</div>
			<div id="incluirPagina"></div>
		</header>

		<section id="contenedor">
			<div id="submenu"> <span class="activo">Seguimiento</span></div>
			<header>Visión Máquina</header>

			<fieldset>
				<div id="recurso_semanal" style="width: 100%; height: 350px; margin:1 auto;"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
        <div id="recurso_mensual" style="width: 100%; height: 350px; margin:1 auto;"></div>
			</fieldset>

		</section>
	</body>
</html>
