<?php
  require_once("../conexion_netezza.php");
  require_once("../querys/netezza/queryNetezza.php");

  $newTo = date("Y-m-d");

  $query = Consumo_MIPS($newTo);

  while($r1 = odbc_fetch_array($query)){
    $series1[] = strtotime($r1['FECHA'].' '.(substr($r1['HORA'],0,-3)))*1000;
  }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  odbc_close($db_con);

 ?>
