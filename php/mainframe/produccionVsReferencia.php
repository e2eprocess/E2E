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
  $series5 = 'Prod. Tres Cantos '.$fechaMaxEjecuciones;
  $series6 = 'Prod. Informacional '.$fechaMaxEjecuciones;

  $produccion = "'ARIEL41 ','ARIEL43 ','ARIEL45 ','ARIEL46 ',
                    'ARIEL48 ','CASIO52 ','CASIO53 ','CASIO55 ',
                    'CASIO56 ','CASIO58 '";

  $consumoMipsActual = Consumo_MIPS($yesterday,$now,$produccion);
  while($r1 = odbc_fetch_array($consumoMipsActual)){
    $series1[] = $r1['MIPS'];
    }

  $consumoMipsMax = Consumo_MIPS($fechaMaxEjecuciones,$fechaMaxEjecuciones,$produccion);
  while($r2 = odbc_fetch_array($consumoMipsMax)){
    $ser2[] = $r2['MIPS'];
    $cat[] = substr($r2['HORA'],0,-3);
    }
  $series2 = array_merge($ser2,$ser2);
  $categories = array_merge($cat,$cat);

  $informacionalActual = "'ARIEL4D ','CASIO5D '";
  $CconsumoInforActual = Consumo_MIPS($yesterday,$now,$informacionalActual);
  while($r3 = odbc_fetch_array($CconsumoInforActual)){
    $series3[] = $r3['MIPS'];
  }

  $CconsumoInforMax = Consumo_MIPS($fechaMaxEjecuciones,$fechaMaxEjecuciones,$informacionalActual);
  while($r4 = odbc_fetch_array($CconsumoInforMax)){
    $ser4[] = $r4['MIPS'];
  }
  $series4 = array_merge($ser4,$ser4);

  $datos = array();
  array_push($datos,$categories);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$series6);
  array_push($datos,$now);
  
  print json_encode($datos, JSON_NUMERIC_CHECK);

  odbc_close($db_con_net);

 ?>
