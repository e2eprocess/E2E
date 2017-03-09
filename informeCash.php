<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link type="text/css" rel="Stylesheet" href="/E2E/css/informe.css">
		<script type="text/javascript" src="/E2E/js/library/jquery.min.js"></script>
    <script type="text/javascript" src="/E2E/js/library/highstock.js"></script>
    <script type="text/javascript" src="/E2E/js/library/exporting.js"></script>
    <script type="text/javascript" src="/E2E/js/netCash/KYOP/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/recurso_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOP/recurso_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYGU/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYGU/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYGU/recurso_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYGU/recurso_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/recurso_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYOS/recurso_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/recurso_mensual.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/KYFB/recurso_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/VS_MQ/recurso_semanal.js"></script>
		<script type="text/javascript" src="/E2E/js/netCash/VS_MQ/recurso_mensual.js"></script>

		<title>C&PM E2E - Seguimiento</title>
  </head>
  <body>
		<section id="contenedor">
			<div class="page imagenPortada">
				<header id="tituloPrincipal">
					<span style="font-size: 50px;">E2E-Seguimiento Net Cash</br></span>
				</header>
				<span style="font-size: 20px; color: white;">Capacity & Performance Management</br></span>
					<div id="horaTitulo"><?php echo date("Y/m/d H:i"); ?></div>
				</header>
			</div>

			<div class="page imagenIndice">
				<header class="tituloGraficas" style="color:white;">
					INDICE
				</header>
				<div id="indice">
					<ol>
						<li>TOPOLOGIA</li>
						<li>HECHOS RELEVANTES</li>
						<li>KYOP - PORTAL</li>
						<LI>KYGU - PERFILADO DE USUARIO</LI>
						<LI>KYGU - PERFILADO DE USUARIO</LI>
						<LI>KYOS - GESTION DE SALDOS</LI>
						<LI>KYFB - MODULO DE FIRMAS</LI>
						<LI>VISION MAQUINA</LI>
					</ol>

				</div>


			</div>

			<div class="page">
				<header class="tituloGraficas">
					01. TOPOLOGIA APLICATIVA
				</header>
				<div style="text-align: center; margin-top: 100px;">
					<img id ="imagenTopologia" src="/E2E/IMG/topologia-cash.jpg"/>
				</div>

			</div>

			<div class="page">
				<header class="tituloGraficas">
					02. HECHOS RELEVANTES
				</header>
				<textarea rows="20" cols="92"></textarea>

			</div>

			<div class="page">
				<header class="tituloGraficas">
					03. KYOP - PORTAL
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_semanalKYOP" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_mensualKYOP" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_semanalKYOP" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_mensualKYOP" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					04. KYGU - PERFILADO DE USUARIO
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_semanalKYGU" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_mensualKYGU" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_semanalKYGU" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_mensualKYGU" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					04. KYOS - GESTION DE SALDOS
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_semanalKYOS" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_mensualKYOS" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_semanalKYOS" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_mensualKYOS" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					04. KYFB - MODULO DE FIRMAS
				</header>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_semanalKYFB" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="aplicacion_mensualKYFB" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_semanalKYFB" style="height:300px;"></div>
				</div>
				<div class="cuadrado">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_mensualKYFB" style="height:300px;"></div>
				</div>
			</div>

			<div class="page">
				<header class="tituloGraficas">
					05. VISIÓN MÁQUINA
				</header>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_semanal" style="height:300px;"></div>
				</div>
				<div class="cuadrado cuadradoCpu">
				  <div class="titular">Información agrupada cada hora</div>
				  <div id="recurso_mensual" style="height:300px;"></div>
				</div>
			</div>




		</section>
  </body>
</html>
