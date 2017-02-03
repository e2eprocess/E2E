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
    $lpsro301CpuHoy = busquedaMaquinaHoy('lpsro301',$newToF,$newTo);
    $lpsro302CpuHoy = busquedaMaquinaHoy('lpsro302',$newToF,$newTo);
    $lpsrv309CpuHoy = busquedaMaquinaHoy('lpsrv309',$newToF,$newTo);
    $lpsrv327CpuHoy = busquedaMaquinaHoy('lpsrv327',$newToF,$newTo);
    $lpsrv328CpuHoy = busquedaMaquinaHoy('lpsrv328',$newToF,$newTo);
    $lpsrv329CpuHoy = busquedaMaquinaHoy('lpsrv329',$newToF,$newTo);
  }else {
    $lpsro301CpuHoy = busquedaMaquina('lpsro301',$newTo);
    $lpsro302CpuHoy = busquedaMaquina('lpsro302',$newTo);
    $lpsrv309CpuHoy = busquedaMaquina('lpsrv309',$newTo);
    $lpsrv327CpuHoy = busquedaMaquina('lpsrv327',$newTo);
    $lpsrv328CpuHoy = busquedaMaquina('lpsrv328',$newTo);
    $lpsrv329CpuHoy = busquedaMaquina('lpsrv329',$newTo);
  }
  $lpsro301CpuPasada = busquedaMaquina('lpsro301',$newFrom);
  $lpsro302CpuPasada = busquedaMaquina('lpsro302',$newFrom);
  $lpsrv309CpuPasada = busquedaMaquina('lpsrv309',$newFrom);
  $lpsrv327CpuPasada = busquedaMaquina('lpsrv327',$newFrom);
  $lpsrv328CpuPasada = busquedaMaquina('lpsrv328',$newFrom);
  $lpsrv329CpuPasada = busquedaMaquina('lpsrv329',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($lpsro301CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($lpsro302CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($lpsrv309CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($lpsrv327CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($lpsrv328CpuPasada)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($lpsrv329CpuPasada)) {
        $series6['data'][] = $r6['cpu'];
      }

  while($r7 = pg_fetch_assoc($lpsro301CpuHoy)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($lpsro302CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = pg_fetch_assoc($lpsrv309CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($lpsrv327CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($lpsrv328CpuHoy)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($lpsrv329CpuHoy)) {
        $series12['data'][] = $r12['cpu'];
      }

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  /*array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$series6);*/
  array_push($datos,$series7);
  array_push($datos,$series8);
  array_push($datos,$series9);
  /*array_push($datos,$series10);
  array_push($datos,$series11);
  array_push($datos,$series12);*/
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
