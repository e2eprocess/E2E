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

  $lparProduccion = "'ARIEL41 ','ARIEL43 ','ARIEL45 ','ARIEL46 ',
                    'ARIEL48 ','CASIO52 ','CASIO53 ','CASIO55 ',
                    'CASIO56 ','CASIO58 '";

  $consumoMips = Consumo_MIPS($yesterday,$now,$lparProduccion);
  while($r1 = odbc_fetch_array($consumoMips)){
    $categories[] = substr($r1['HORA'],0,-3);
    $series1[] = $r1['MIPS'];
    $series2[] = $r1['CONSUMO_MAQUINA'];
    $series3[] = $r1['MAX_MAQUINA'];
  }

  $lparInformacional = "'ARIEL4D ','CASIO5D '";
  $CconsumoInfor = Consumo_MIPS($yesterday,$now,$lparInformacional);
  while($r2 = odbc_fetch_array($CconsumoInfor)){
    $series4[] = $r2['MIPS'];
  }

  $datos = array();
  array_push($datos,$categories);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$now);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  odbc_close($db_con);

 ?>
