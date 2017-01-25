<?php
  require_once("conexion_e2e_process.php");
  require_once("queryHighstock.php");

  $series1 = array();

  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));

  $query = busqueda($newTo);

  while($r1 = pg_fetch_assoc($query)) {
    $fecha = $r1['fecha']*1000;
    $series1[] = [$fecha, $r1['tiempo'],$r1['peticiones'],
    $r1['apbad002'],$r1['apbad003'],
    $r1['apbad004'],$r1['apbad006']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
