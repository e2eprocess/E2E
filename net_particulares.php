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
		<script type="text/javascript" src="/E2E/js/netParticulares/highstock.js"></script>
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
		<script type="text/javascript" src="/E2E/js/library/highstock.js"></script>
		<script type="text/javascript" src="/E2E/js/library/exporting.js"></script>
		<header id="menu-header">
			<div id="incluirPagina"></div>
		</header>
		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu">
				<span class="activo">Seguimiento</span>
			</div>
			<header>Net Particulares</header>
			<fieldset>
				<div id="container" style="height: 700px; min-width: 500px"></div>
			</fieldset>
		</section>
	</body>
</html>
