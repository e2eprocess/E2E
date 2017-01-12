<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/netParticulares/KQOF/aplicacion_mensual.js"></script>
		<script type="text/javascript" src="../js/netParticulares/KQOF/aplicacion_semanal.js"></script>
		<script type="text/javascript" src="../js/netParticulares/KQOF/recurso_mensual.js"></script>
    <script type="text/javascript" src="../js/netParticulares/KQOF/recurso_semanal.js"></script>
	  <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
		<link rel="Stylesheet" type="text/css" href="../css/estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/tablas.css">
		<link rel="Stylesheet" type="text/css" href="../css/menu.css">
	</head>
	<body>
		<header id="menu-header">
			<div id="cabecera">
					<div id="logo"><h>E2E -	Performance management</h></br>
						Informe aplicaciones / recursos
			</div>
			<nav>
				<ul class="menu">
					<li><a href="../net_particulares.php">Net Particulares</a>
						<ul>
							<li><a href="KQOF.php">KQOF-Frontal</a></li>
							<li><a href="ENPS.php">ENPS-Servicios multicanal</a></li>
							<li><a href="ESMB.php">ESMB-Servicios básicos </a></li>
							<li><a href="vision_maquina.php">Visión Máquina</a></li>
						</ul>
					</li>
					<li><a href="../net_cash.php">NetCash</a>
						<ul>
							<li><a href="../net_cash/KYOP.php">KYOP-Portal</a></li>
							<li><a href="../net_cash/KYGU.php">KYGU-Perfilado de usuarios</a></li>
							<li><a href="../net_cash/KYOS.php">KYOS-Gestión de saldos</a></li>
							<li><a href="../net_cash/KYFB_informe.php">KYFB-Módulo de firmas</a></li>
							<li><a href="../net_cash/vision_maquina.php">Visión máquina</a></li>
						</ul>
					</li>
					<li><a href="../movil.php">Móvil</a>
					</li>
					<li><a>Oficinas</a>
						<ul>
							<li><a href="../oficinas/EECC.php">Escenario comerciales</a></li>
							<li><a href="../oficinas/NCOC.php">Objeto cliente</a></li>
						</ul>
					</li>
					<li><a>ASO</a>
						<ul>
							<li><a href="../ASO/particulares.php">Net Particulares</a></li>
							<li><a href="../ASO/cash.php">Net Cash</a></li>
							<li><a href="../ASO/movil.php">Móvil</a></li>
							<li><a href="../ASO/oficinas.php">Oficinas</a></li>
						</ul>
					</li>
					<li><a href="../APX.php">APX</a></li>
				</ul>
			</nav>
		</header>

		<section id="contenedor">
			<div id="submenu"><a href="KQOF.php">Seguimiento</a> | <span class="activo">Informe</span></div>
			<header>KQOF - Frontal</header>

			<fieldset>
				<div id="aplicacion_semanal" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div id="aplicacion_mensual" style="width: 50%; height: 400px; margin:1 auto;float:left"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
        <div id="recurso_semanal" style="width: 50%; height: 500px; margin:1 auto;float:left"></div>
        <div id="recurso_mensual" style="width: 50%; height: 500px; margin:1 auto;float:left"></div>
			</fieldset>
			<div style="width: 50%; float:left"><?php include('../php/netParticulares/KQOF/tabla_semanal.php');?></div>
			<div style="width: 50%; float:left"><?php include('../php/netParticulares/KQOF/tabla_mensual.php');?></div>

		</section>
	</body>
</html>
