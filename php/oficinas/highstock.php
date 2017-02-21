<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryHighstock.php");

  $series1 = array();

  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  $idHost = '10,11,12,13,14,15,16';

  $query = busquedaOficinas('eecc',$newTo,$idHost);

  while($r1 = pg_fetch_assoc($query)) {
    $fecha = $r1['fecha']*1000;
    $series1[] = [$fecha,
    $r1['cpu1'],$r1['cpu2'],
    $r1['cpu3'],$r1['cpu4'],
    $r1['cpu5'],$r1['cpu6'],
    $r1['cpu7']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
