<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryCpu.php");

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
    $apbad002CpuHoy = busquedaMaquinaHoy('apbad002',$newToF,$newTo);
    $apbad003CpuHoy = busquedaMaquinaHoy('apbad003',$newToF,$newTo);
    $apbad004CpuHoy = busquedaMaquinaHoy('apbad004',$newToF,$newTo);
    $apbad006CpuHoy = busquedaMaquinaHoy('apbad006',$newToF,$newTo);
  }else{
    $apbad002CpuHoy = busquedaMaquina('apbad002',$newTo);
    $apbad003CpuHoy = busquedaMaquina('apbad003',$newTo);
    $apbad004CpuHoy = busquedaMaquina('apbad004',$newTo);
    $apbad006CpuHoy = busquedaMaquina('apbad006',$newTo);
  }
  $apbad002CpuPasada = busquedaMaquina('apbad002',$newFrom);
  $apbad003CpuPasada = busquedaMaquina('apbad003',$newFrom);
  $apbad004CpuPasada = busquedaMaquina('apbad004',$newFrom);
  $apbad006CpuPasada = busquedaMaquina('apbad006',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($apbad002CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($apbad003CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($apbad004CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($apbad006CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }

  while($r5 = pg_fetch_assoc($apbad002CpuHoy)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($apbad003CpuHoy)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($apbad004CpuHoy)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($apbad006CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
