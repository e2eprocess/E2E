<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinformeTags.php");

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$servicciosTime = tiempo('kyos_mult_web_servicios',$hoy,'10 days');
$posicionTime = tiempo('kyos_mult_web_posicioncuentas',$hoy,'10 days');
$servicciosPeti = peticiones('kyos_mult_web_servicios',$hoy,'10 days');
$posicionPeti = peticiones('kyos_mult_web_posicioncuentas',$hoy,'10 days');

while($r1  = pg_fetch_assoc($servicciosTime)) {
      $series1[] = $r1;
    }
while($r2  = pg_fetch_assoc($servicciosPeti)) {
      $series2[] = $r2;
    }
while($r3  = pg_fetch_assoc($posicionTime)) {
      $series3[] = $r3;
    }
while($r4  = pg_fetch_assoc($posicionPeti)) {
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
