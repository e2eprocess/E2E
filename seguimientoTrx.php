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
		<script type="text/javascript" src="/E2E/js/seguimientoTrx/host.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoTrx/apx.js"></script>
		<script type="text/javascript" src="/E2E/js/seguimientoTrx/acumuladoTrx.js"></script>
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
			<?php 
				include("php/fechaFrom.php"); 
			?>
			<form id="comparador" action='' method='post'>
				<input type="text" name="from" id="from" readonly="readonly" size="12" value="<?= $from ?>"/>
				<input type="submit" value="Ver día" name="consulta"/>
			</form>
      <script src="external/jquery/jquery.js"></script>
      <script src="js/fecha/jquery-ui.js"></script>
      <script src="js/fecha/calendario.js"></script>

      <header style="padding-bottom: 10px;"><?=$from?></header>
      
			<fieldset id="recuadroSeguimiento">
				<div id="host"></div>
			</fieldset>
			<fieldset id="recuadroSeguimiento">
				<div id="apx"></div>
			</fieldset>
			<fieldset id="recuadroAcumulado">
				<div id="acumuladoTrx"></div>	
				<?php
					include("php/seguimientoTrx/tablaPorcentajes.php"); 
				?>
			</fieldset>
    </section>
  </body>
</html>
