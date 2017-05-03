<?php
  require_once("conexion_e2e_process.php");
  require_once("queryHighstock.php");

  $series1 = array();

  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));

  $query = enpsHighstock($newTo);

  while($r1 = pg_fetch_assoc($query)) {
    $fecha = $r1['fecha']*1000;
    $series1[] = [$fecha, $r1['atr1'],$r1['atr2'],
    $r1['atr3'],$r1['atr4']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
