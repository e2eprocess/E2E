<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link type="text/css" rel="Stylesheet" href="/E2E/css/estilo.css">
		<link type="text/css" rel="stylesheet" href="/E2E/css/drop-down-menu.css">
		<link type="text/css" rel="Stylesheet" href="/E2E/css/menu.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/stock/highstock.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript" src="/E2E/js/mainframe/batch.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/online.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/sysplexMaquina.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/produccionVsReferencia.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/movil/ENPP/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/movil/ENPP/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/movil/ENPP/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/tiempoInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/particulares/tiempoInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/particulares/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/particulares/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/cash/tiempoInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/cash/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/Cash/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/EECC/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/EECC/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/cpuImparInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/cpuParInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/oficinas/tiempoInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/oficinas/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/oficinas/cpuInforme.js"></script>
  </head>
  <body>
		<section id="contenedor">

			<header style="font-size: 100px;padding-top:200px; page-break-after: always">
				COMPORTAMIENTO</br>
				CANALES</br>
				<span style="font-size: 40px;"><?php echo date("Y/m/d h:i"); ?></span>
			</header>

			<!-- BACKEND -->
			<header style="font-size: 100px; padding-top:200px; page-break-after: always;">
					BACKENDS
			</header>
			<header id="cabeceraGrafico">MAINFRAME</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="sysplexMaquina"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="produccionVsReferencia"></div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="batch"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="online"></div>
			</fieldset>
			<!-- APX -->
			<header id="cabeceraGrafico" style="page-break-before: always;">APX</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoRespuestaAPX"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesAPX"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuAPX"></div>
			</fieldset>

			<!-- MOVIL -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL</br>
				MOVIL
			</header>
			<header id="cabeceraGrafico" style="page-break-before: always;">MOVIL - Frontal</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoRespuestaMovil"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesMovil"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuMovil"></div>
			</fieldset>
			<!-- ASO-MOVIL -->
			<header id="cabeceraGrafico" style="page-break-before: always;">MOVIL - ASO</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoASOMovil"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesASOMovil"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuASOMovil"></div>
			</fieldset>

			<!-- Net Particulares -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL </br>
				NET PARTICULARES
			</header>
			<header id="cabeceraGrafico" style="page-break-before: always;">PARTICULARES - FRONT</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoRespuestaKQOF"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesKQOF"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuKQOF"></div>
			</fieldset>
			<!-- Net Particulares-ASO -->
			<header id="cabeceraGrafico" style="page-break-before: always;">PARTICULARES - ASO</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoASONet"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesASONet"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuASONet"></div>
			</fieldset>

			<!-- Cash -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL </br>
				NET CASH
			</header>
			<header id="cabeceraGrafico" style="page-break-before: always;">CASH - FRONT</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoRespuestaCash"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesCash"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuCash"></div>
			</fieldset>
			<!-- Cash-ASO -->
			<header id="cabeceraGrafico" style="page-break-before: always;">CASH - ASO</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoASOCash"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesASOCash"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuASOCash"></div>
			</fieldset>

			<!-- OFICINAS -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL </br>
				OFICINAS
			</header>
			<header id="cabeceraGrafico" style="page-break-before: always;">OFICINAS - FRONT</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoRespuestaOfi"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesOfi"></div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="cpuParOfi"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="cpuImparOfi"></div>
			</fieldset>
			<!-- OFICINAS-ASO -->
			<header id="cabeceraGrafico" style="page-break-before: always;">OFICINAS - ASO</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="tiempoASOOfi"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticionesASOOfi"></div>
			</fieldset>
			<fieldset id="recuadroTitular" style="width: 98%; text-align: center;">
				<div>Información agrupada cada 5 minutos</div>
			</fieldset>
			<fieldset id="recuadro"style="width:97.9%; height:300px;">
				<div id="cpuASOOfi"></div>
			</fieldset>

		</section>
  </body>
</html>
