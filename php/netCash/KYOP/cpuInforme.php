<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../querys/informeMensual/informeMensual.php");

  $maxPeticiones = max_peti('kyop_mult_web_kyoppresentation');
  $r8 = pg_fetch_assoc($maxPeticiones);
  $newFrom = $r8['fecha_max'];

  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
  $to = date("Y-m-d");

  $titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

  $apbad022_To = seguimientoCPUHoy('apbad022',$newToF,$newTo,'netcash','KYOP%','CPU');
  $apbad023_To = seguimientoCPUHoy('apbad023',$newToF,$newTo,'netcash','KYOP%','CPU');
  $apbad024_To = seguimientoCPUHoy('apbad024',$newToF,$newTo,'netcash','KYOP%','CPU');
  $apbad026_To = seguimientoCPUHoy('apbad026',$newToF,$newTo,'netcash','KYOP%','CPU');

  $apbad022_From = seguimientoCPU('apbad022',$newFrom,'netcash','KYOP%','CPU');
  $apbad023_From = seguimientoCPU('apbad023',$newFrom,'netcash','KYOP%','CPU');
  $apbad024_From = seguimientoCPU('apbad024',$newFrom,'netcash','KYOP%','CPU');
  $apbad026_From = seguimientoCPU('apbad026',$newFrom,'netcash','KYOP%','CPU');

  $category['name'] = 'fecha';

  while($r1 = pg_fetch_assoc($apbad022_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($apbad023_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($apbad024_From)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($apbad026_From)) {
        $series4['data'][] = $r4['cpu'];
      }
    while($r5 = pg_fetch_assoc($apbad022_To)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($apbad023_To)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($apbad024_To)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($apbad026_To)) {
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
