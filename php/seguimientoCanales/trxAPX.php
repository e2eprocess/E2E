<?php
	require_once("../conexion_e2e_process.php");
	require_once("../querys/seguimientoCanales/query.php");
	require_once("../querys/informeMensual/informeMensual.php");

	/*Recuperar variables de sesión que contienen las fechas a comparar*/
	session_start();
	$from = $_SESSION["fechaFromSeguimiento"];
	$newFrom = date("Y-m-d 00:00", strtotime($from));
	$to = date("Y-m-d 23:59", strtotime($from));


	$maxPeticiones = max_peti2('apx acumulado');
	$r8 = pg_fetch_assoc($maxPeticiones);
	//$totalPeticiones = total_peti($newFrom, $to);
	$r9 = pg_fetch_assoc(total_peti($newFrom, $to));
	$totalPeticiones = number_format($r9['total'],0);
	//$max_peti = $r8['max_peticiones'];
	$max_peti = number_format($r8['max_peticiones'],0);
	$Fecha_peti = substr($r8['fecha'],0,8);
	$fecha_busqueda = date("d/m/Y", strtotime($from));
	//$Fecha_peti = substr($r8['fecha_max'],0,8);
	$Fecha_peti_hora = $r8['fecha'];
	$new_fechaFrom = date("Y-d-m 00:00", strtotime($Fecha_peti));
	$new_fechaTo = date("Y-d-m 23:59", strtotime($Fecha_peti));
	//$TituloPeticiones = "Max. Transacciones $Fecha_peti_hora";
	$TituloPeticionesMax = "Día max. Trx $Fecha_peti ($max_peti)";
	$TituloPeticiones = "Transacciones $fecha_busqueda ($totalPeticiones)";

	$apxPeticiones = busqueda('apx acumulado',$newFrom,$to,'Throughput');
	$apxPeticionesMax = busqueda('apx acumulado',$new_fechaFrom,$new_fechaTo,'Throughput');

	while($r1  = pg_fetch_assoc($apxPeticiones)) {
		$fecha = $r1['x']*1000;
	    $series1[] = [$fecha,$r1['y']];
	}
	while($r2  = pg_fetch_assoc($apxPeticionesMax)) {
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