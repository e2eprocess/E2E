<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinformeTags.php");

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$KYGU_S01_10 = recursos('KYGU_S01_10',$hoy,'40 days');
$KYGU_S01_11 = recursos('KYGU_S01_11',$hoy,'40 days');
$KYGU_S01_20 = recursos('KYGU_S01_20',$hoy,'40 days');
$KYGU_S01_21 = recursos('KYGU_S01_21',$hoy,'40 days');
$KYGU_S01_30 = recursos('KYGU_S01_30',$hoy,'40 days');
$KYGU_S01_31 = recursos('KYGU_S01_31',$hoy,'40 days');
$KYGU_S01_40 = recursos('KYGU_S01_40',$hoy,'40 days');
$KYGU_S01_41 = recursos('KYGU_S01_41',$hoy,'40 days');


$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($KYGU_S01_10)) {
      $series1[] = [$r1['fecha'],$r1['cpu']];
      $series2[] = [$r1['fecha'],$r1['memoria']];
    }
while($r2  = pg_fetch_assoc($KYGU_S01_11)) {
      $series3[] = [$r2['fecha'],$r2['cpu']];
      $series4[] = [$r2['fecha'],$r2['memoria']];
    }
while($r3  = pg_fetch_assoc($KYGU_S01_20)) {
      $series5[] = [$r3['fecha'],$r3['cpu']];
      $series6[] = [$r3['fecha'],$r3['memoria']];
    }
while($r4  = pg_fetch_assoc($KYGU_S01_21)) {
      $series7[] = [$r4['fecha'],$r4['cpu']];
      $series8[] = [$r4['fecha'],$r4['memoria']];
    }
while($r5  = pg_fetch_assoc($KYGU_S01_30)) {
      $series9[] = [$r5['fecha'],$r5['cpu']];
      $series10[] = [$r5['fecha'],$r5['memoria']];
    }
while($r6  = pg_fetch_assoc($KYGU_S01_31)) {
      $series11[] = [$r6['fecha'],$r6['cpu']];
      $series12[] = [$r6['fecha'],$r6['memoria']];
    }
while($r7  = pg_fetch_assoc($KYGU_S01_40)) {
      $series13[] = [$r7['fecha'],$r7['cpu']];
      $series14[] = [$r7['fecha'],$r7['memoria']];
    }
while($r8  = pg_fetch_assoc($KYGU_S01_41)) {
      $series15[] = [$r8['fecha'],$r8['cpu']];
      $series16[] = [$r8['fecha'],$r8['memoria']];
    }

$datos = array();
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
