<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryCpu.php");

$hoy = date("Y-m-d H:m", strtotime('-10 minute'));

$apbad002 = visionMaquina('apbad002',$hoy,'10 days');
$apbad003 = visionMaquina('apbad003',$hoy,'10 days');
$apbad004 = visionMaquina('apbad004',$hoy,'10 days');
$apbad006 = visionMaquina('apbad006',$hoy,'10 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($apbad002)) {
      /*$series1['data'][] = $r1['cpu_avg'];*/
      $series5['data'][] = $r1['cpu'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($apbad003)) {
      /*$series2['data'][] = $r2['cpu_avg'];*/
      $series6['data'][] = $r2['cpu'];
    }
while($r3  = pg_fetch_assoc($apbad004)) {
      /*$series3['data'][] = $r3['cpu_avg'];*/
      $series7['data'][] = $r3['cpu'];
    }
while($r4  = pg_fetch_assoc($apbad006)) {
      /*$series4['data'][] = $r4['cpu_avg'];*/
      $series8['data'][] = $r4['cpu'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series5);
array_push($datos,$series6);
array_push($datos,$series7);
array_push($datos,$series8);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
