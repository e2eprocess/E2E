<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinforme.php");

$hoy= date("Y-m-d H:m", strtotime('-10 minute'));

$ESMB_S02_25 = recursos('ESMB_S02_25',$hoy,'10 days');
$ESMB_S02_26 = recursos('ESMB_S02_26',$hoy,'10 days');
$ESMB_S02_35 = recursos('ESMB_S02_35',$hoy,'10 days');
$ESMB_S02_36 = recursos('ESMB_S02_36',$hoy,'10 days');
$ESMB_S02_45 = recursos('ESMB_S02_45',$hoy,'10 days');
$ESMB_S02_46 = recursos('ESMB_S02_46',$hoy,'10 days');
$ESMB_S02_65 = recursos('ESMB_S02_65',$hoy,'10 days');
$ESMB_S02_66 = recursos('ESMB_S02_66',$hoy,'10 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($ESMB_S02_25)) {
      $series1['data'][] = $r1['cpu'];
      $series2['data'][] = $r1['memoria'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($ESMB_S02_26)) {
      $series3['data'][] = $r2['cpu'];
      $series4['data'][] = $r2['memoria'];
    }
while($r4  = pg_fetch_assoc($ESMB_S02_35)) {
      $series5['data'][] = $r4['cpu'];
      $series6['data'][] = $r4['memoria'];
    }
while($r5  = pg_fetch_assoc($ESMB_S02_36)) {
      $series7['data'][] = $r5['cpu'];
      $series8['data'][] = $r5['memoria'];
    }
while($r7  = pg_fetch_assoc($ESMB_S02_45)) {
      $series9['data'][] = $r7['cpu'];
      $series10['data'][] = $r7['memoria'];
    }
while($r8  = pg_fetch_assoc($ESMB_S02_46)) {
      $series11['data'][] = $r8['cpu'];
      $series12['data'][] = $r8['memoria'];
    }
while($r10  = pg_fetch_assoc($ESMB_S02_65)) {
      $series13['data'][] = $r10['cpu'];
      $series14['data'][] = $r10['memoria'];
    }
while($r11  = pg_fetch_assoc($ESMB_S02_66)) {
      $series15['data'][] = $r11['cpu'];
      $series16['data'][] = $r11['memoria'];
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
array_push($datos,$series11);
array_push($datos,$series12);
array_push($datos,$series13);
array_push($datos,$series14);
array_push($datos,$series15);
array_push($datos,$series16);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
