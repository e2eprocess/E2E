<?php
  require_once("../conexion_netezza.php");
  require_once("../querys/netezza/queryNetezza.php");
  require_once("gestionFechasNetezza.php");

  /*gestionFechasNetezza Agrupación de la gestión de las fechas.
  No se tienen en cuenta los fines de semana.
  $from = Fecha de hoy menos 8 días;
  $to = Fecha de hoy menos 7 días;
  $yesterday = Fecha de hoy menos 1 día;
  $now = Fecha de hoy;*/

  $queryMaxEjecuciones = maxEjecuciones($now);
  $r2 = odbc_fetch_array($queryMaxEjecuciones);
  $fechaMaxEjecuciones = $r2['FECHA'];
  $series5 = 'Ejecuciones '.$fechaMaxEjecuciones;

  $actual = online($yesterday,$now);
  while($r1 = odbc_fetch_array($actual)){
    $series1[] = /*[(strtotime($r1['FECHA'].' '.(substr($r1['TIME'],0,-3)))*1000),*/$r1['EJECS'];
  }

  $maxEjecuciones = online($fechaMaxEjecuciones,$fechaMaxEjecuciones);
  while($r2 = odbc_fetch_array($maxEjecuciones)){
    $series2[] = $r2['EJECS'];
  }
  $series4 = array_merge($series2,$series2);

  $semanaPasada = online($from,$to);
  while($r3 = odbc_fetch_array($semanaPasada)){
    //$categories[] = (strtotime($r3['FECHA'].' '.(substr($r3['TIME'],0,-3)))*1000);
    $categories[] = $r3['HORA'];
    $series3[] = $r3['EJECS'];
  }

  $datos = array();
  array_push($datos,$categories);
  array_push($datos,$series1);
  array_push($datos,$series4);
  array_push($datos,$series3);
  array_push($datos,$now);
  array_push($datos,$series5);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  odbc_close($db_con_net);

 ?>
