<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/netCash/VS_MQ/recurso_semanal.js"></script>
		<script type="text/javascript" src="../js/netCash/VS_MQ/recurso_mensual.js"></script>
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
					</li>
					<li><a href="../net_cash.php">NetCash</a>
						<ul>
							<li><a href="KYOP.php">KYOP-Portal</a></li>
							<li><a href="KYGU.php">KYGU-Perfilado de usuarios</a></li>
							<li><a href="KYOS.php">KYOS-Gestión de saldos</a></li>
							<li><a href="KYFB.php">KYFB-Módulo de firmas</a></li>
							<li><a href="vision_maquina.php">Visión máquina</a></li>
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
			<div id="submenu"> Seguimiento | Informe </div>
			<header>KYOS - Gestión de saldos</header>

			<fieldset>
				<div id="recurso_semanal" style="width: 100%; height: 350px; margin:1 auto;"></div>
				<div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div>
        <div id="recurso_mensual" style="width: 100%; height: 350px; margin:1 auto;"></div>
			</fieldset>

		</section>
	</body>
</html>
