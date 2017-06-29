<?php
	require_once("../conexion_netezza.php");
	require_once("../querys/netezza/queryNetezza.php");
	require_once("../mainframe/gestionFechasNetezza.php");

	/*Recuperar variables de sesión que contienen las fechas a comparar*/
	session_start();

	$from = $_SESSION["fechaFromSeguimiento"];
	$from = substr($from, -4).'-'.substr($from, 3,2).'-'.substr($from, 0,2);


	$queryMaxEjecuciones = maxEjecuciones($now);
  	$r2 = odbc_fetch_array($queryMaxEjecuciones);
  	$fechaMaxEjecuciones = $r2['FECHA'];
  	$TituloPeticiones = "Día max. Trx $fechaMaxEjecuciones";

	$peticiones = onlineSeguimiento($from);
	

	while($r1 = odbc_fetch_array($peticiones)){
		$fecha = $r1['X']*1000;
	    $series1[] = [$fecha,$r1['Y']];
  	}

  	$maxEjecuciones = onlineSeguimiento($fechaMaxEjecuciones);
	while($r2 = odbc_fetch_array($maxEjecuciones)){
	    $series2[] = [$r2['Y']];
  	}

  	$datos = array();
  	array_push($datos,$series1);
  	array_push($datos,$series2);
  	array_push($datos,$TituloPeticiones);

  	print json_encode($datos, JSON_NUMERIC_CHECK);

	odbc_close($db_con);


?>