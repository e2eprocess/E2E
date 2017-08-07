<?php
	require_once("../conexion_e2e_process.php");
	require_once("../querys/seguimientoCanales/query.php");
	require_once("../querys/informeMensual/informeMensual.php");
	require_once("../conexion_netezza.php");
	require_once("../querys/netezza/queryNetezza.php");
	require_once("../mainframe/gestionFechasNetezza.php");

	/*Recuperar variables de sesión que contienen las fechas a comparar*/
	session_start();
	$from = $_SESSION["fechaFromSeguimiento"];
	$newFrom = date("Y-m-d 00:00", strtotime($from));
	$to = date("Y-m-d 23:59", strtotime($from));

	/*NETEZZA*/
	$queryMaxEjecuciones = maxEjecuciones($now);
  	$r2 = odbc_fetch_array($queryMaxEjecuciones);
  	$fechaMaxEjecuciones = $r2['FECHA'];
  	$max_peti = number_format($r2['EJECS'],0);
  	$fechaPeti = date("d/m/Y", strtotime($from));
  	$fechaMax = date("d/m/Y", strtotime($fechaMaxEjecuciones));
	$r3 = odbc_fetch_array(peticionesDia($from));
	$totalPeticiones = number_format($r3['EJEC'],0);
  	//$TituloPeticiones = "Transacciones $fechaPeti ($totalPeticiones)";
  	$TituloPeticionesMax = "Día max. Trx $fechaMax ($max_peti)";

  	/*POSTGRESQL*/
	$maxPeticiones = max_peti2('Transacciones Host',$to);
	$r8 = pg_fetch_assoc($maxPeticiones);
	
	//$totalPeticiones = total_peti($newFrom, $to);
	$r9 = pg_fetch_assoc(total_peti('Transacciones Host',$newFrom, $to));
	$totalPeticiones = number_format($r9['total'],0);
	//$max_peti = $r8['max_peticiones'];
	//$max_peti = number_format($r8['max_peticiones'],0);
	
	//$Fecha_peti = substr($r8['fecha'],0,8);
	$Fecha_peti = $r8['fecha_max'];
	$fecha_busqueda = date("d/m/Y", strtotime($from));
	$fecha_peti_texto = date("d/m/Y", strtotime($Fecha_peti));
	$new_fechaFrom = date("Y-m-d 00:00", strtotime($fechaMax));
	$new_fechaTo = date("Y-m-d 23:59", strtotime($fechaMax));
	//$TituloPeticionesMax = "Día max. Trx $fecha_peti_texto ($max_peti)";
	$TituloPeticiones = "Transacciones $fecha_busqueda ($totalPeticiones)";

	$hostPeticiones = busqueda('Transacciones Host',$newFrom,$to,'Throughput');
	$hostPeticionesMax = busqueda('Transacciones Host',$new_fechaFrom,$new_fechaTo,'Throughput');

	while($r1  = pg_fetch_assoc($hostPeticiones)) {
		$fecha = $r1['x']*1000;
	    $series1[] = [$fecha,$r1['y']];
	}
	while($r2  = pg_fetch_assoc($hostPeticionesMax)) {
	    $series2[] = [$r2['y']];
	}

	$datos = array();
	array_push($datos,$series1);
	array_push($datos,$series2);
	array_push($datos,$TituloPeticionesMax);
	array_push($datos,$TituloPeticiones);

	print json_encode($datos, JSON_NUMERIC_CHECK);

	pg_close($db_con);
?>