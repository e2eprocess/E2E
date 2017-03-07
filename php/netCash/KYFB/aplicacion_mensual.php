<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinformeTags.php");

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$firmasTime = tiempo('kyfb_mult_web_firmas',$hoy,'40 days');
$kyfbwsTime = tiempo('kyfb_mult_web_kyfbws',$hoy,'40 days');
$firmasPeti = peticiones('kyfb_mult_web_firmas',$hoy,'40 days');
$kyfbwsPeti = peticiones('kyfb_mult_web_kyfbws',$hoy,'40 days');

while($r1  = pg_fetch_assoc($firmasTime)) {
      $series1[] = $r1;
    }
while($r2  = pg_fetch_assoc($firmasPeti)) {
      $series2[] = $r2;
    }
while($r3  = pg_fetch_assoc($kyfbwsTime)) {
      $series3[] = $r3;
    }
while($r4  = pg_fetch_assoc($kyfbwsPeti)) {
      $series4[] = $r4;
    }

$datos = array();
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
