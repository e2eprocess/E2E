<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryCpu.php");

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  if(date("Y-m-d")==$newTo){
    $newToF = date("Y-m-d 00:00");
    $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
    $lpsrm301CpuHoy = busquedaMaquinaHoy('lpsrm301',$newToF,$newTo);
    $lpsrm302CpuHoy = busquedaMaquinaHoy('lpsrm302',$newToF,$newTo);
    $lpsrv310CpuHoy = busquedaMaquinaHoy('lpsrv310',$newToF,$newTo);
    $lpsrv311CpuHoy = busquedaMaquinaHoy('lpsrv311',$newToF,$newTo);
    $lpsrv314CpuHoy = busquedaMaquinaHoy('lpsrv314',$newToF,$newTo);
    $lpsrv315CpuHoy = busquedaMaquinaHoy('lpsrv315',$newToF,$newTo);
    $lpsrv316CpuHoy = busquedaMaquinaHoy('lpsrv316',$newToF,$newTo);
    $lpsrv322CpuHoy = busquedaMaquinaHoy('lpsrv322',$newToF,$newTo);
    $lpsrv323CpuHoy = busquedaMaquinaHoy('lpsrv323',$newToF,$newTo);
  }else {
    $lpsrm301CpuHoy = busquedaMaquina('lpsrm301',$newTo);
    $lpsrm302CpuHoy = busquedaMaquina('lpsrm302',$newTo);
    $lpsrv310CpuHoy = busquedaMaquina('lpsrv310',$newTo);
    $lpsrv311CpuHoy = busquedaMaquina('lpsrv311',$newTo);
    $lpsrv314CpuHoy = busquedaMaquina('lpsrv314',$newTo);
    $lpsrv315CpuHoy = busquedaMaquina('lpsrv315',$newTo);
    $lpsrv316CpuHoy = busquedaMaquina('lpsrv316',$newTo);
    $lpsrv322CpuHoy = busquedaMaquina('lpsrv322',$newTo);
    $lpsrv323CpuHoy = busquedaMaquina('lpsrv323',$newTo);

  }
  $lpsrm301CpuPasada = busquedaMaquina('lpsrm301',$newFrom);
  $lpsrm302CpuPasada = busquedaMaquina('lpsrm302',$newFrom);
  $lpsrv310CpuPasada = busquedaMaquina('lpsrv310',$newFrom);
  $lpsrv311CpuPasada = busquedaMaquina('lpsrv311',$newFrom);
  $lpsrv314CpuPasada = busquedaMaquina('lpsrv314',$newFrom);
  $lpsrv315CpuPasada = busquedaMaquina('lpsrv315',$newFrom);
  $lpsrv316CpuPasada = busquedaMaquina('lpsrv316',$newFrom);
  $lpsrv322CpuPasada = busquedaMaquina('lpsrv322',$newFrom);
  $lpsrv323CpuPasada = busquedaMaquina('lpsrv323',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($lpsrm301CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($lpsrm302CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($lpsrv310CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($lpsrv311CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($lpsrv314CpuPasada)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($lpsrv315CpuPasada)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($lpsrv316CpuPasada)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($lpsrv322CpuPasada)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = pg_fetch_assoc($lpsrv323CpuPasada)) {
        $series9['data'][] = $r9['cpu'];
      }

  while($r10 = pg_fetch_assoc($lpsrm301CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($lpsrm302CpuHoy)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($lpsrv310CpuHoy)) {
        $series12['data'][] = $r12['cpu'];
      }
  while($r13 = pg_fetch_assoc($lpsrv311CpuHoy)) {
        $series13['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($lpsrv314CpuHoy)) {
        $series14['data'][] = $r14['cpu'];
      }
  while($r15 = pg_fetch_assoc($lpsrv315CpuHoy)) {
        $series15['data'][] = $r15['cpu'];
      }
  while($r16 = pg_fetch_assoc($lpsrv316CpuHoy)) {
        $series16['data'][] = $r16['cpu'];
      }
  while($r17 = pg_fetch_assoc($lpsrv322CpuHoy)) {
        $series17['data'][] = $r17['cpu'];
      }
  while($r18 = pg_fetch_assoc($lpsrv323CpuHoy)) {
        $series18['data'][] = $r18['cpu'];
      }

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$series6);
  array_push($datos,$series7);
  /*array_push($datos,$series8);
  array_push($datos,$series9);*/
  array_push($datos,$series10);
  array_push($datos,$series11);
  array_push($datos,$series12);
  array_push($datos,$series13);
  array_push($datos,$series14);
  array_push($datos,$series15);
  array_push($datos,$series16);
  /*array_push($datos,$series17);
  array_push($datos,$series18);*/
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
