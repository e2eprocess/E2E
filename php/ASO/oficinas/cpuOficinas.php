<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryCpu.php");

  /*Declaracion de arrays json*/
  $category = array();
  $titulo = array();
  $series1 = array();
  $series2 = array();
  $series3 = array();
  $series4 = array();
  $series5 = array();
  $series6 = array();
  $series7 = array();
  $series8 = array();
  $series9 = array();
  $series10 = array();

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
    $lpsro302CpuHoy = busquedaMaquinaHoy('lpsro302',$newToF,$newTo);
    $lpsrv309CpuHoy = busquedaMaquinaHoy('lpsrv309',$newToF,$newTo);
    $lpsro301CpuHoy = busquedaMaquinaHoy('lpsro301',$newToF,$newTo);
    $lpsrv328CpuHoy = busquedaMaquinaHoy('lpsrv328',$newToF,$newTo);
    $lpsrv329CpuHoy = busquedaMaquinaHoy('lpsrv329',$newToF,$newTo);
  }else {
    $lpsro302CpuHoy = busquedaMaquina('lpsro302',$newTo);
    $lpsrv309CpuHoy = busquedaMaquina('lpsrv309',$newTo);
    $lpsro301CpuHoy = busquedaMaquina('lpsro301',$newTo);
    $lpsrv328CpuHoy = busquedaMaquina('lpsrv328',$newTo);
    $lpsrv329CpuHoy = busquedaMaquina('lpsrv329',$newTo);
  }
  $lpsro302CpuPasada = busquedaMaquina('lpsro302',$newFrom);
  $lpsrv309CpuPasada = busquedaMaquina('lpsrv309',$newFrom);
  $lpsro301CpuPasada = busquedaMaquina('lpsro301',$newFrom);
  $lpsrv328CpuPasada = busquedaMaquina('lpsrv328',$newFrom);
  $lpsrv329CpuPasada = busquedaMaquina('lpsrv329',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($lpsro302CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($lpsrv309CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($lpsro301CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($lpsrv328CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($lpsrv329CpuPasada)) {
        $series5['data'][] = $r1['cpu'];
      }

  while($r6 = pg_fetch_assoc($lpsro302CpuHoy)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($lpsrv309CpuHoy)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($lpsro301CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = pg_fetch_assoc($lpsrv328CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($lpsrv329CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
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
  array_push($datos,$series8);
  array_push($datos,$series9);
  array_push($datos,$series10);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
