<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../querys/informeMensual/informeMensual.php");

  $maxPeticiones = max_peti('ASOnetcash');
  $r8 = pg_fetch_assoc($maxPeticiones);
  $newFrom = $r8['fecha_max'];

  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  $to = date("Y-m-d");

  $titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

  $lpsrv305CpuHoy = busquedaMaquinaHoy('lpsrv305',$newToF,$newTo);
  $lpsrv306CpuHoy = busquedaMaquinaHoy('lpsrv306',$newToF,$newTo);
  $lpsrv325CpuHoy = busquedaMaquinaHoy('lpsrv325',$newToF,$newTo);
  $lpsrv326CpuHoy = busquedaMaquinaHoy('lpsrv326',$newToF,$newTo);
  $lpsrv333CpuHoy = busquedaMaquinaHoy('lpsrv333',$newToF,$newTo);
  $lpsrv334CpuHoy = busquedaMaquinaHoy('lpsrv334',$newToF,$newTo);

  $lpsrv305CpuPasada = busquedaMaquina('lpsrv305',$newFrom);
  $lpsrv306CpuPasada = busquedaMaquina('lpsrv306',$newFrom);
  $lpsrv325CpuPasada = busquedaMaquina('lpsrv325',$newFrom);
  $lpsrv326CpuPasada = busquedaMaquina('lpsrv326',$newFrom);
  $lpsrv333CpuPasada = busquedaMaquina('lpsrv333',$newFrom);
  $lpsrv334CpuPasada = busquedaMaquina('lpsrv334',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';

  while($r1 = pg_fetch_assoc($lpsrv305CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($lpsrv306CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  /*while($r3 = pg_fetch_assoc($lpsrv325CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($lpsrv326CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($lpsrv333CpuPasada)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($lpsrv334CpuPasada)) {
        $series6['data'][] = $r6['cpu'];
      }*/

  while($r7 = pg_fetch_assoc($lpsrv305CpuHoy)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($lpsrv306CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  /*while($r9 = pg_fetch_assoc($lpsrv325CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($lpsrv326CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($lpsrv333CpuHoy)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($lpsrv334CpuHoy)) {
        $series12['data'][] = $r12['cpu'];
      }*/

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  /*array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$series6);*/
  array_push($datos,$series7);
  array_push($datos,$series8);
  /*array_push($datos,$series9);
  array_push($datos,$series10);
  array_push($datos,$series11);
  array_push($datos,$series12);*/
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
