<?php
	require_once("php/conexion_e2e_process.php");
	require_once("php/conexion_netezza.php");
	require_once("php/querys/netezza/queryNetezza.php");
	require_once("php/querys/seguimientoCanales/query.php");
	require_once("php/querys/informeMensual/informeMensual.php");
	require_once("php/mainframe/gestionFechasNetezza.php");

	$from = $_SESSION["fechaFromSeguimiento"];
	$newFrom = date("Y-m-d 00:00", strtotime($from));
	$to = date("Y-m-d 23:59", strtotime($from));

	$totalApx = pg_fetch_assoc(total_peti('apx acumulado',$newFrom, $to));
	$totalPeticionesApx = number_format($totalApx['total'],0,'','.');
	$totalHost = pg_fetch_assoc(total_peti('Transacciones Host',$newFrom, $to));
	$totalPeticionesHost = number_format($totalHost['total'],0,'','.');
	$total = pg_fetch_assoc(total_peti('Transacciones Host+APX',$newFrom, $to));
	//$totalPeticiones = number_format($total['total'],0,'','.');

	$maxPeticiones = max_peti2('Transacciones Host+APX', date("Y-m-d 23:59"));
	$r8 = pg_fetch_assoc($maxPeticiones);
	$max_peti = number_format($r8['max_peticiones'],0,'','.');
	$Fecha_peti = substr($r8['fecha'],0,8);
	$fecha_max = date("m-d-Y", strtotime($Fecha_peti));
	$new_fechaFrom = date("Y-d-m 00:00", strtotime($Fecha_peti));
	$new_fechaTo = date("Y-d-m 23:59", strtotime($Fecha_peti));
	$totalApxMax = pg_fetch_assoc(total_peti('apx acumulado',$new_fechaFrom, $new_fechaTo));
	$totalPeticionesApxMax = number_format($totalApxMax['total'],0,'','.');
	$totalHostMax = pg_fetch_assoc(total_peti('Transacciones Host',$new_fechaFrom, $new_fechaTo));
	$totalPeticionesHostMax = number_format($totalHostMax['total'],0,'','.');
	$totalMax = pg_fetch_assoc(total_peti('Transacciones Host+APX',$new_fechaFrom, $new_fechaTo));	


	$queryMaxEjecuciones = maxEjecuciones($now);
  	$r2 = odbc_fetch_array($queryMaxEjecuciones);
  	$max_peti_net = number_format($r2['EJECS'],0,'','.');

  	$totalPeticiones = number_format($totalApx['total']+$totalHost['total'],0,'','.');


  	$totalPeticionesMax = number_format($r2['EJECS']+$totalApxMax['total'],0,'','.');

	
	$porcentajeApx = number_format((number_format($totalApx['total'],0,'','')*100)/number_format($total['total'],0,'',''),2);
	$porcentajeHost = number_format((number_format($totalHost['total'],0,'','')*100)/number_format($total['total'],0,'',''),2);

	$porcentajeApxMax = number_format((number_format($totalApxMax['total'],0,'','')*100)/($r2['EJECS']+$totalApxMax['total']),2);
	$porcentajeHostMax = number_format((number_format($r2['EJECS'],0,'','')*100)/($r2['EJECS']+$totalApxMax['total']),2);




	echo "<table>";
		echo "<tr>";
			echo "<th>Fecha</th>";
			echo "<th>Peticiones Host</th>";
			echo "<th>Porcentaje Host</th>";
			echo "<th>Peticiones APX</th>";
			echo "<th>Porcentaje APX</th>";
			echo "<th>Total Peticiones</th>";
		echo "</tr>";
		echo "<tr>";
			echo "<td><b>$from</b></td>";
			echo "<td><b>$totalPeticionesHost</b></td>";
			echo "<td><b>$porcentajeHost %</b></td>";
			echo "<td><b>$totalPeticionesApx</b></td>";
			echo "<td><b>$porcentajeApx %</b></td>";
			echo "<td><b>$totalPeticiones</b></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Fecha max. pet.</th>";
			echo "<th>Pet. Host día max.</th>";
			echo "<th>Porcentaje Host día max.</th>";
			echo "<th>Peticiones APX día max.</th>";
			echo "<th>Porcentaje APX día max.</th>";
			echo "<th>Total Peticiones día max.</th>";
		echo "</tr>";
		echo "<tr>";
			echo "<td><b>$fecha_max</b></td>";
			echo "<td><b>$max_peti_net</b></td>";
			echo "<td><b>$porcentajeHostMax %</b></td>";
			echo "<td><b>$totalPeticionesApxMax</b></td>";
			echo "<td><b>$porcentajeApxMax %</b></td>";
			echo "<td><b>$totalPeticionesMax</b></td>";
		echo "</tr>";
	echo "</table>";


?>