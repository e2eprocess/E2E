<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link type="text/css" rel="Stylesheet" href="/E2E/css/informe.css">
		<script type="text/javascript" src="/E2E/js/library/jquery.min.js"></script>
    <script type="text/javascript" src="/E2E/js/library/highstock.js"></script>
    <script type="text/javascript" src="/E2E/js/library/exporting.js"></script>
    <script type="text/javascript" src="/E2E/js/mainframe/batch.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/online.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/sysplexMaquina.js"></script>
		<script type="text/javascript" src="/E2E/js/mainframe/produccionVsReferencia.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/APX/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/MOVIL/ENPP/tiempoRespuestaInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/MOVIL/ENPP/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/MOVIL/ENPP/cpuInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/MOVIL/tiempoInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/MOVIL/peticionesInforme.js"></script>
		<script type="text/javascript" src="/E2E/js/ASO/MOVIL/cpuInforme.js"></script>
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
		<title>C&PM E2E - Seguimiento</title>
  </head>
  <body>
		<section id="contenedor">
			<div class="page imagenPortada">
				<header id="tituloPrincipal">
					COMPORTAMIENTO</br>
					CANALES</br>
				</header>
					<div id="horaTitulo"><?php echo date("Y/m/d H:i"); ?></div>
				</header>
			</div>

			<!--BACKENDS-->
			<div class="page">
				<header class="tituloSecundario">
					BACKENDS
				</header>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					MAINFRAME
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 15 minutos</div>
				  <div id="sysplexMaquina" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 15 minutos</div>
				  <div id="produccionVsReferencia" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 15 minutos</div>
				  <div id="batch" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 15 minutos</div>
				  <div id="online" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					APX
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoRespuestaAPX" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesAPX" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuAPX" style="height:300px;"></div>
				</div>
			</div>

			<!-- MÓVIL -->
			<div class="page">
				<header class="tituloSecundario">
					CANAL</br>
					MÓVIL
				</header>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					MÓVIL- Frontal
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoRespuestaMovil" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesMovil" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuMovil" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					MÓVIL - ASO
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoASOMovil" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesASOMovil" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuASOMovil" style="height:300px;"></div>
				</div>
			</div>

			<!-- Net Particulares -->
			<div class="page">
				<header class="tituloSecundario">
					CANAL </br>
					NET PARTICULARES
				</header>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					PARTICULARES- Frontal
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoRespuestaKQOF" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesKQOF" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuKQOF" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					PARTICULARES - ASO
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoASONet" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesASONet" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuASONet" style="height:300px;"></div>
				</div>
			</div>

			<!-- Cash -->
			<div class="page">
				<header class="tituloSecundario">
					CANAL </br>
					NET CASH
				</header>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					CASH - Frontal
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoRespuestaCash" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesCash" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuCash" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					CASH - ASO
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoASOCash" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesASOCash" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuASOCash" style="height:300px;"></div>
				</div>
			</div>

			<!-- OFICINAS -->
			<div class="page">
				<header class="tituloSecundario">
					CANAL </br>
					OFICINAS
				</header>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					OFICINAS - Frontal
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoRespuestaOfi" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesOfi" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuParOfi" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuImparOfi" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					OFICINAS - ASO
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="tiempoASOOfi" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="peticionesASOOfi" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada 5 minutos</div>
				  <div id="cpuASOOfi" style="height:300px;"></div>
				</div>
			</div>


		</section>
  </body>
</html>
