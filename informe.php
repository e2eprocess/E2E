<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link type="text/css" rel="Stylesheet"  href="/E2E/css/estilo.css">
		<link type="text/css" rel="stylesheet" href="/E2E/css/drop-down-menu.css">
		<link rel="Stylesheet" type="text/css" href="/E2E/css/menu.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/stock/highstock.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript" src="/E2E/js/mainframe/batch.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/online.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/sysplexMaquina.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/produccionVsReferencia.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/movil/ENPP/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/movil/ENPP/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/movil/ENPP/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/tiempo.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/movil/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/netParticulares/KQOF/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/particulares/tiempo.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/particulares/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/particulares/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/cash/tiempo.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/cash/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/Cash/cpu.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/EECC/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/EECC/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/cpuImpar.js"></script>
		<script type="text/javascript" src="/E2E/js/oficinas/cpuPar.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/oficinas/tiempo.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/oficinas/peticiones.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/oficinas/cpu.js"></script>
  </head>
  <body>
		<section id="contenedor">
			<header style="font-size: 100px;padding-top:200px;padding-bottom:390px;">
				COMPORTAMIENTO </br>
				CANALES</br>
				<span style="font-size: 40px;"><?php echo date("Y/m/d h:i"); ?></span>
			</header>

			<!-- BACKEND -->
			<header style="font-size: 100px;padding-top:350px;padding-bottom:450px;">
				BACKENDS
			</header>

			<header id="cabeceraGrafico">MAINFRAME</header>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 15 minutos</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada 15 minutos</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="sysplexMaquina"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="produccionVsReferencia"></div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada hora</div>
			</fieldset>
			<fieldset id="recuadroTitular">
				<div>Información agrupada cada hora</div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="batch"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="online"></div>
			</fieldset>
			<!-- APX -->
			<header id="cabeceraGrafico">APX</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuAPX"></div>
			</fieldset>

			<!-- MOVIL -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL</br>
				MOVIL
			</header>
			<header id="cabeceraGrafico">MOVIL - Frontal</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuMovil"></div>
			</fieldset>
			<!-- ASO-MOVIL -->
			<header id="cabeceraGrafico">MOVIL - ASO</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuASOMovil"></div>
			</fieldset>

			<!-- Net Particulares -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL </br>
				NET PARTICULARES
			</header>
			<header id="cabeceraGrafico">PARTICULARES - FRONT</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuKQOF"></div>
			</fieldset>
			<!-- Net Particulares-ASO -->
			<header id="cabeceraGrafico">PARTICULARES - ASO</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuASONet"></div>
			</fieldset>

			<!-- Cash -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL </br>
				NET CASH
			</header>
			<header id="cabeceraGrafico">CASH - FRONT</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuCash"></div>
			</fieldset>
			<!-- Cash-ASO -->
			<header id="cabeceraGrafico">CASH - ASO</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuASOCash"></div>
			</fieldset>

			<!-- OFICINAS -->
			<header style="font-size: 100px;padding-top:1270px;padding-bottom:350px;">
				CANAL </br>
				OFICINAS
			</header>
			<header id="cabeceraGrafico">OFICINAS - FRONT</header>
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
			<header id="cabeceraGrafico">OFICINAS - ASO</header>
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
			<fieldset id="recuadro"style="width: 98%;">
				<div id="cpuASOOfi"></div>
			</fieldset>

		</section>
  </body>
</html>
