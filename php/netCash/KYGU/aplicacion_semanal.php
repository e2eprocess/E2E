<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinformeTags.php");

$hoy= date("Y-m-d H:m", strtotime('-10 minute'));

$frontusuarioTime = tiempo('kygu_mult_web_frontusuario',$hoy,'10 days');
$frontusuarioPeti = peticiones('kygu_mult_web_frontusuario',$hoy,'10 days');
$serviciosusuarioTime = tiempo('kygu_mult_web_serviciosusuario',$hoy,'10 days');
$serviciosusuarioPeti = peticiones('kygu_mult_web_serviciosusuario',$hoy,'10 days');

while($r1  = pg_fetch_assoc($frontusuarioTime)) {
      $series1[] = $r1;
    }
while($r2  = pg_fetch_assoc($serviciosusuarioTime)) {
      $series3[] = $r2;
    }
while($r3  = pg_fetch_assoc($frontusuarioPeti)) {
      $series2[] = $r3;
    }
while($r4  = pg_fetch_assoc($serviciosusuarioPeti)) {
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
