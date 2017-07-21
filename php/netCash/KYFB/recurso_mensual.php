<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinformeTags.php");

$hoy= date("Y-m-d H:m", strtotime('-10 minute'));

$KYFB_S01_10 = recursos('KYFB_S01_10',$hoy,'40 days');
$KYFB_S01_11 = recursos('KYFB_S01_11',$hoy,'40 days');
$KYFB_S01_12 = recursos('KYFB_S01_12',$hoy,'40 days');
$KYFB_S01_20 = recursos('KYFB_S01_20',$hoy,'40 days');
$KYFB_S01_21 = recursos('KYFB_S01_21',$hoy,'40 days');
$KYFB_S01_22 = recursos('KYFB_S01_22',$hoy,'40 days');
$KYFB_S01_30 = recursos('KYFB_S01_30',$hoy,'40 days');
$KYFB_S01_31 = recursos('KYFB_S01_31',$hoy,'40 days');
$KYFB_S01_32 = recursos('KYFB_S01_32',$hoy,'40 days');
$KYFB_S01_40 = recursos('KYFB_S01_40',$hoy,'40 days');
$KYFB_S01_41 = recursos('KYFB_S01_41',$hoy,'40 days');
$KYFB_S01_42 = recursos('KYFB_S01_42',$hoy,'40 days');

while($r1  = pg_fetch_assoc($KYFB_S01_10)) {
      $series1[] = [$r1['fecha'],$r1['cpu']];
      $series2[] = [$r1['fecha'],$r1['memoria']];
    }
while($r2  = pg_fetch_assoc($KYFB_S01_11)) {
      $series3[] = [$r2['fecha'],$r2['cpu']];
      $series4[] = [$r2['fecha'],$r2['memoria']];
    }
while($r3  = pg_fetch_assoc($KYFB_S01_12)) {
      $series5[] = [$r3['fecha'],$r3['cpu']];
      $series6[] = [$r3['fecha'],$r3['memoria']];
    }
while($r4  = pg_fetch_assoc($KYFB_S01_20)) {
      $series7[] = [$r4['fecha'],$r4['cpu']];
      $series8[] = [$r4['fecha'],$r4['memoria']];
    }
while($r5  = pg_fetch_assoc($KYFB_S01_21)) {
      $series9[] = [$r5['fecha'],$r5['cpu']];
      $series10[] = [$r5['fecha'],$r5['memoria']];
    }
while($r6  = pg_fetch_assoc($KYFB_S01_22)) {
      $series11[] = [$r6['fecha'],$r6['cpu']];
      $series12[] = [$r6['fecha'],$r6['memoria']];
    }
while($r7  = pg_fetch_assoc($KYFB_S01_30)) {
      $series13[] = [$r7['fecha'],$r7['cpu']];
      $series14[] = [$r7['fecha'],$r7['memoria']];
    }
while($r8  = pg_fetch_assoc($KYFB_S01_31)) {
      $series15[] = [$r8['fecha'],$r8['cpu']];
      $series16[] = [$r8['fecha'],$r8['memoria']];
    }
while($r9  = pg_fetch_assoc($KYFB_S01_32)) {
      $series17[] = [$r9['fecha'],$r9['cpu']];
      $series18[] = [$r9['fecha'],$r9['memoria']];
    }
while($r10  = pg_fetch_assoc($KYFB_S01_40)) {
      $series19[] = [$r10['fecha'],$r10['cpu']];
      $series20[] = [$r10['fecha'],$r10['memoria']];
    }
while($r11  = pg_fetch_assoc($KYFB_S01_41)) {
      $series21[] = [$r11['fecha'],$r11['cpu']];
      $series22[] = [$r11['fecha'],$r11['memoria']];
    }
while($r12  = pg_fetch_assoc($KYFB_S01_42)) {
      $series23[] = [$r12['fecha'],$r12['cpu']];
      $series24[] = [$r12['fecha'],$r12['memoria']];
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
array_push($datos,$series17);
array_push($datos,$series18);
array_push($datos,$series19);
array_push($datos,$series20);
array_push($datos,$series21);
array_push($datos,$series22);
array_push($datos,$series23);
array_push($datos,$series24);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
