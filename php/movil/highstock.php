<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryHighstock.php");

  $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
  $idHost = '1,2,3,4';

  $query = busqueda('enpp_mult_web',$newTo,$idHost);

  while($r1 = pg_fetch_assoc($query)) {
    $fecha = $r1['fecha']*1000;
    $series1[] = [$fecha, $r1['tiempo'],$r1['peticiones'],
    $r1['cpu1'],$r1['cpu2'],
    $r1['cpu3'],$r1['cpu4']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
