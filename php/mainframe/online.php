<?php
  require_once("../conexion_netezza.php");
  require_once("../querys/netezza/queryNetezza.php");

  $newTo = date("Y-m-d");

  $query = online($newTo);

  while($r1 = odbc_fetch_array($query)){
    $series1[] = $r1;
  }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  odbc_close($db_con);

 ?>
