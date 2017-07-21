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
    $apbad002_To = seguimientoCPUHoy('apbad002',$newToF,$newTo,'net','KQOF%','CPU');
    $apbad003_To = seguimientoCPUHoy('apbad003',$newToF,$newTo,'net','KQOF%','CPU');
    $apbad004_To = seguimientoCPUHoy('apbad004',$newToF,$newTo,'net','KQOF%','CPU');
    $apbad006_To = seguimientoCPUHoy('apbad006',$newToF,$newTo,'net','KQOF%','CPU');
  }else{
    $apbad002_To = seguimientoCPU('apbad002',$newTo,'net','KQOF%','CPU');
    $apbad003_To = seguimientoCPU('apbad003',$newTo,'net','KQOF%','CPU');
    $apbad004_To = seguimientoCPU('apbad004',$newTo,'net','KQOF%','CPU');
    $apbad006_To = seguimientoCPU('apbad006',$newTo,'net','KQOF%','CPU');
  }
  $apbad002_From = seguimientoCPU('apbad002',$newFrom,'net','KQOF%','CPU');
  $apbad003_From = seguimientoCPU('apbad003',$newFrom,'net','KQOF%','CPU');
  $apbad004_From = seguimientoCPU('apbad004',$newFrom,'net','KQOF%','CPU');
  $apbad006_From = seguimientoCPU('apbad006',$newFrom,'net','KQOF%','CPU');



  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($apbad002_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($apbad003_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($apbad004_From)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($apbad006_From)) {
        $series4['data'][] = $r4['cpu'];
      }
    while($r5 = pg_fetch_assoc($apbad002_To)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($apbad003_To)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($apbad004_To)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($apbad006_To)) {
        $series8['data'][] = $r8['cpu'];
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
