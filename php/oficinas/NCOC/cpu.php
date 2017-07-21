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
    $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
    $spnac005CpuHoy = busquedaMaquinaHoy('spnac005',$newToF,$newTo);
    $spnac006CpuHoy = busquedaMaquinaHoy('spnac006',$newToF,$newTo);
    $spnac007CpuHoy = busquedaMaquinaHoy('spnac007',$newToF,$newTo);
    $spnac008CpuHoy = busquedaMaquinaHoy('spnac008',$newToF,$newTo);
    $spnac009CpuHoy = busquedaMaquinaHoy('spnac009',$newToF,$newTo);
    $spnac010CpuHoy = busquedaMaquinaHoy('spnac010',$newToF,$newTo);
    $spnac012CpuHoy = busquedaMaquinaHoy('spnac012',$newToF,$newTo);
  }else {
    $spnac005CpuHoy = busquedaMaquina('spnac005',$newTo);
    $spnac006CpuHoy = busquedaMaquina('spnac006',$newTo);
    $spnac007CpuHoy = busquedaMaquina('spnac007',$newTo);
    $spnac008CpuHoy = busquedaMaquina('spnac008',$newTo);
    $spnac009CpuHoy = busquedaMaquina('spnac009',$newTo);
    $spnac010CpuHoy = busquedaMaquina('spnac010',$newTo);
    $spnac012CpuHoy = busquedaMaquina('spnac012',$newTo);
  }
    $spnac005CpuPasada = busquedaMaquina('spnac005',$newFrom);
    $spnac006CpuPasada = busquedaMaquina('spnac006',$newFrom);
    $spnac007CpuPasada = busquedaMaquina('spnac007',$newFrom);
    $spnac008CpuPasada = busquedaMaquina('spnac008',$newFrom);
    $spnac009CpuPasada = busquedaMaquina('spnac009',$newFrom);
    $spnac010CpuPasada = busquedaMaquina('spnac010',$newFrom);
    $spnac012CpuPasada = busquedaMaquina('spnac012',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($spnac005CpuPasada)) {
        $series1['data'][] = $r1['cpu'];
        $category['data'][] = $r1['fecha'];
      }
  while($r2 = pg_fetch_assoc($spnac006CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($spnac007CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($spnac008CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($spnac009CpuPasada)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($spnac010CpuPasada)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($spnac012CpuPasada)) {
        $series7['data'][] = $r7['cpu'];
      }

  while($r8 = pg_fetch_assoc($spnac005CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = pg_fetch_assoc($spnac006CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($spnac007CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($spnac008CpuHoy)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($spnac009CpuHoy)) {
        $series12['data'][] = $r12['cpu'];
      }
  while($r13 = pg_fetch_assoc($spnac010CpuHoy)) {
        $series13['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($spnac012CpuHoy)) {
        $series14['data'][] = $r14['cpu'];
      }

  /*Carga del array del Json*/
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
  array_push($datos,$series11);
  array_push($datos,$series12);
  array_push($datos,$series13);
  array_push($datos,$series14);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
