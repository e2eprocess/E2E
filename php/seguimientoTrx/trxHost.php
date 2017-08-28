<?php
	require_once("../conexion_netezza.php");
	require_once("../querys/netezza/queryNetezza.php");
	require_once("../mainframe/gestionFechasNetezza.php");
	require_once("../conexion_e2e_process.php");
	require_once("../querys/seguimientoCanales/query.php");
	require_once("../querys/informeMensual/informeMensual.php");

	/*Recuperar variables de sesión que contienen las fechas a comparar*/
	session_start();

	$from = $_SESSION["fechaFromSeguimiento"];
	$newFrom = date("Y-m-d 00:00", strtotime($from));
	$to = date("Y-m-d 23:59", strtotime($from));
	$from = substr($from, -4).'-'.substr($from, 3,2).'-'.substr($from, 0,2);

	$queryMaxEjecuciones = maxEjecuciones($now,$from);
  	$r2 = odbc_fetch_array($queryMaxEjecuciones);
  	$fechaMaxEjecuciones = $r2['FECHA'];
  	$max_peti = number_format($r2['EJECS'],0);
  	$fechaPeti = date("d/m/Y", strtotime($from));
  	$fechaMax = date("d/m/Y", strtotime($fechaMaxEjecuciones));
  	$newFechaFrom = date("Y-d-m 00:00", strtotime($fechaMax));
  	$newFechaTo = date("Y-d-m 23:59", strtotime($fechaMax));
	$r3 = odbc_fetch_array(peticionesDia($from));
	$totalPeticiones = number_format($r3['EJEC'],0);
  	$TituloPeticiones = "Transacciones $fechaPeti ($totalPeticiones)";
  	$TituloPeticionesMax = "Día max. Trx $fechaMax ($max_peti)";
	

	//$peticiones = onlineSeguimiento($from);
	$peticiones = busqueda('Transacciones Host',$newFrom,$to,'Throughput');
	

	while($r1 = pg_fetch_assoc($peticiones)){
		$fecha = $r1['x']*1000;
	    $series1[] = [$fecha,$r1['y']];
  	}

  	//$maxEjecuciones = onlineSeguimiento($fechaMaxEjecuciones);
  	$maxEjecuciones = busqueda('Transacciones Host',$newFechaFrom,$newFechaTo,'Throughput');

	while($r2 = pg_fetch_assoc($maxEjecuciones)){
	    $series2[] = [$r2['y']];
  	}

  	$datos = array();
  	array_push($datos,$series1);
  	array_push($datos,$series2);
  	array_push($datos,$TituloPeticionesMax);
  	array_push($datos,$TituloPeticiones);

  	print json_encode($datos, JSON_NUMERIC_CHECK);

	odbc_close($db_con_net);


?>