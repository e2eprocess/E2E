<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinforme.php");

$category = array();
$series1 = array();
$series2 = array();
$series3 = array();
$series4 = array();

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$firmasTime = tiempo('kyfb_mult_web_firmas',$hoy,'10 days');
$kyfbwsTime = tiempo('kyfb_mult_web_kyfbws',$hoy,'10 days');
$firmasPeti = peticiones('kyfb_mult_web_firmas',$hoy,'10 days');
$kyfbwsPeti = peticiones('kyfb_mult_web_kyfbws',$hoy,'10 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($firmasTime)) {
      $series1['data'][] = $r1['tiempo_respuesta'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($firmasPeti)) {
      $series2['data'][] = $r2['peticiones'];
    }
while($r3  = pg_fetch_assoc($kyfbwsTime)) {
      $series3['data'][] = $r3['tiempo_respuesta'];
    }
while($r4  = pg_fetch_assoc($kyfbwsPeti)) {
      $series4['data'][] = $r4['peticiones'];
    }


$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);


print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
