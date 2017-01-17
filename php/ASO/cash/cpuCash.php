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
    $lpsrv306CpuHoy = busquedaMaquinaHoy('lpsrv306',$newToF,$newTo);
    $lpsrv325CpuHoy = busquedaMaquinaHoy('lpsrv325',$newToF,$newTo);
    $lpsrv305CpuHoy = busquedaMaquinaHoy('lpsrv305',$newToF,$newTo);
  }else {
    $lpsrv306CpuHoy = busquedaMaquina('lpsrv306',$newTo);
    $lpsrv325CpuHoy = busquedaMaquina('lpsrv325',$newTo);
    $lpsrv305CpuHoy = busquedaMaquina('lpsrv305',$newTo);

  }
  $lpsrv306CpuPasada = busquedaMaquina('lpsrv306',$newFrom);
  $lpsrv325CpuPasada = busquedaMaquina('lpsrv325',$newFrom);
  $lpsrv305CpuPasada = busquedaMaquina('lpsrv305',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($lpsrv306CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($lpsrv325CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($lpsrv305CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }

  while($r4 = pg_fetch_assoc($lpsrv306CpuHoy)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($lpsrv325CpuHoy)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($lpsrv305CpuHoy)) {
        $series6['data'][] = $r6['cpu'];
      }

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$series6);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
