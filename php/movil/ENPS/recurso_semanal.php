
<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinforme.php");

$category = array();
$series1 = array();
$series2 = array();
$series3 = array();
$series4 = array();
$series5 = array();
$series6 = array();
$series7 = array();
$series8 = array();
$series9 = array();
$series10 = array();
$series11 = array();
$series12 = array();
$series13 = array();
$series14 = array();
$series15 = array();
$series16 = array();
$series17 = array();
$series18 = array();
$series19 = array();
$series20 = array();
$series21 = array();
$series22 = array();
$series23 = array();
$series24 = array();

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$ENPS_801_23 = recursos('ENPS_801_23',$hoy,'10 days');
$ENPS_801_24 = recursos('ENPS_801_24',$hoy,'10 days');
$ENPS_801_33 = recursos('ENPS_801_33',$hoy,'10 days');
$ENPS_801_34 = recursos('ENPS_801_34',$hoy,'10 days');
$ENPS_801_43 = recursos('ENPS_801_43',$hoy,'10 days');
$ENPS_801_44 = recursos('ENPS_801_44',$hoy,'10 days');
$ENPS_801_63 = recursos('ENPS_801_63',$hoy,'10 days');
$ENPS_801_64 = recursos('ENPS_801_64',$hoy,'10 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($ENPS_801_23)) {
      $series1['data'][] = $r1['cpu'];
      $series2['data'][] = $r1['memoria'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($ENPS_801_24)) {
      $series3['data'][] = $r2['cpu'];
      $series4['data'][] = $r2['memoria'];
    }
while($r4  = pg_fetch_assoc($ENPS_801_33)) {
      $series5['data'][] = $r4['cpu'];
      $series6['data'][] = $r4['memoria'];
    }
while($r5  = pg_fetch_assoc($ENPS_801_34)) {
      $series7['data'][] = $r5['cpu'];
      $series8['data'][] = $r5['memoria'];
    }
while($r7  = pg_fetch_assoc($ENPS_801_43)) {
      $series9['data'][] = $r7['cpu'];
      $series10['data'][] = $r7['memoria'];
    }
while($r8  = pg_fetch_assoc($ENPS_801_44)) {
      $series11['data'][] = $r8['cpu'];
      $series12['data'][] = $r8['memoria'];
    }
while($r10  = pg_fetch_assoc($ENPS_801_63)) {
      $series13['data'][] = $r10['cpu'];
      $series14['data'][] = $r10['memoria'];
    }
while($r11  = pg_fetch_assoc($ENPS_801_64)) {
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
