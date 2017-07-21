<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../querys/informeMensual/informeMensual.php");

  $maxPeticiones = max_peti('enpp_mult_web');
  $r8 = pg_fetch_assoc($maxPeticiones);
  $newFrom = $r8['fecha_max'];

  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
  $to = date("Y-m-d");

  $titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

  $apbad002_To = seguimientoCPUHoy('apbad002',$newToF,$newTo,'mobile','ENPP%','CPU');
  $apbad003_To = seguimientoCPUHoy('apbad003',$newToF,$newTo,'mobile','ENPP%','CPU');
  $apbad004_To = seguimientoCPUHoy('apbad004',$newToF,$newTo,'mobile','ENPP%','CPU');
  $apbad006_To = seguimientoCPUHoy('apbad006',$newToF,$newTo,'mobile','ENPP%','CPU');

  $apbad002_From = seguimientoCPU('apbad002',$newFrom,'mobile','ENPP%','CPU');
  $apbad003_From = seguimientoCPU('apbad003',$newFrom,'mobile','ENPP%','CPU');
  $apbad004_From = seguimientoCPU('apbad004',$newFrom,'mobile','ENPP%','CPU');
  $apbad006_From = seguimientoCPU('apbad006',$newFrom,'mobile','ENPP%','CPU');

  $category['name'] = 'fecha';

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
