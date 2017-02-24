<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryHighstock.php");

  $series1 = array();

  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  $idHost = '5,6,7,8';

  $query = busquedaPeticiones($newTo);

  while($r1 = pg_fetch_assoc($query)) {
    $fecha = $r1['fecha']*1000;
    $series1[] = [$fecha, $r1['kyfb_firmas'],$r1['kyfb_kyfbws'],
    $r1['kygu_front'],$r1['kygu_servicios'],
    $r1['kyop'],$r1['kyos_posicion'],$r1['kyos_servicios']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
