<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
    	<link type="text/css" rel="stylesheet" href="/E2E/css/jquery-ui.css">
		<link type="text/css" rel="Stylesheet" href="/E2E/css/estilo.css">
    	<link type="text/css" rel="stylesheet" href="/E2E/css/drop-down-menu.css">
    	<link type="text/css" rel="Stylesheet" href="/E2E/css/menu.css">
		<script type="text/javascript" src="/E2E/js/library/jquery.min.js"></script>
		<script type="text/javascript" src="/E2E/js/library/highstock.js"></script>
    	<script type="text/javascript" src="/E2E/js/seguimientoCanales/particulares.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoCanales/cash.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoCanales/movil.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoCanales/eecc.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoCanales/ncoc.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoCanales/host.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoCanales/apx.js"></script>
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
		<section id="contenedor" style="padding-top:30px;">

			<!-- Formulario gestión fechas -->
			<?php include("php/fechaFrom.php"); ?>
			<form id="comparador" action='' method='post'>
				<input type="text" name="from" id="from" readonly="readonly" size="12" value="<?= $from ?>"/>
				<input type="submit" value="Ver día" name="consulta"/>
			</form>
      <script src="external/jquery/jquery.js"></script>
      <script src="js/fecha/jquery-ui.js"></script>
      <script src="js/fecha/calendario.js"></script>

      <header style="padding-bottom: 10px;"><?=$from?></header>
      
			<fieldset id="recuadroSeguimiento">
				<div id="particulares"></div>
			</fieldset>
			<fieldset id="recuadroSeguimiento">
				<div id="cash"></div>
			</fieldset>
			<fieldset id="recuadroSeguimiento">
				<div id="movil"></div>
			</fieldset>
			<fieldset id="recuadroSeguimiento">
				<div id="eecc" style="height:200px;"></div>
				<div style="border-top:1px solid #CDCDCD;margin:0;padding:0;clear:both;"></div>
				<div id="ncoc" style="height:200px;"></div>
			</fieldset>
			<fieldset id="recuadroSeguimiento">
				<div id="host"></div>
			</fieldset>
			<fieldset id="recuadroSeguimiento">
				<div id="apx"></div>
			</fieldset>
    </section>
  </body>
</html>
