<?php
	require_once("../conexion_e2e_process.php");
	require_once("../querys/seguimientoCanales/query.php");
	require_once("../querys/informeMensual/informeMensual.php");

	/*Recuperar variables de sesión que contienen las fechas a comparar*/
	session_start();
	$from = $_SESSION["fechaFromSeguimiento"];
	$newFrom = date("Y-m-d 00:00", strtotime($from));
	$to = date("Y-m-d 23:59", strtotime($from));


	$total = pg_fetch_assoc(total_peti('Transacciones Host+APX',$newFrom, $to));
	$totalPeticiones = number_format($total['total'],0);

	$maxPeticiones = max_peti2('Transacciones Host+APX', date("Y-m-d 23:59"));
	$r8 = pg_fetch_assoc($maxPeticiones);
	
	$fecha_busqueda = date("d/m/Y", strtotime($from));
	
	$TituloPeticiones = "Transacciones $fecha_busqueda ($totalPeticiones)";

	$max_peti = number_format($r8['max_peticiones'],0);
	$Fecha_peti = substr($r8['fecha'],0,8);
	$fecha_busqueda = date("d/m/Y", strtotime($from));
	$new_fechaFrom = date("Y-d-m 00:00", strtotime($Fecha_peti));
	$new_fechaTo = date("Y-d-m 23:59", strtotime($Fecha_peti));
	$TituloPeticionesMax = "Día max. Trx $Fecha_peti ($max_peti)";
	$TituloPeticiones = "Transacciones $fecha_busqueda ($totalPeticiones)";

	$apxPeticiones = busqueda('apx acumulado',$newFrom,$to,'Throughput');
	$hostPeticiones = busqueda('Transacciones Host',$newFrom,$to,'Throughput');
	$acumuladoPeticiones = busqueda('Transacciones Host+APX',$new_fechaFrom,$new_fechaTo,'Throughput');

	while($r1  = pg_fetch_assoc($apxPeticiones)) {
		$fecha = $r1['x']*1000;
	    $series1[] = [$fecha,$r1['y']];
	}

	while($r2  = pg_fetch_assoc($hostPeticiones)) {
		$fecha = $r2['x']*1000;
	    $series2[] = [$fecha,$r2['y']];
	}

	while($r3  = pg_fetch_assoc($acumuladoPeticiones)) {
	    $series3[] = [$r3['y']];
	}
	
	$datos = array();
	array_push($datos,$series1);
	array_push($datos,$series2);
	array_push($datos,$series3);
	array_push($datos,$TituloPeticionesMax);

	print json_encode($datos, JSON_NUMERIC_CHECK);

	pg_close($db_con);
?>