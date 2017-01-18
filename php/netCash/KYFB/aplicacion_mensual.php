<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinforme.php");

$category = array();
$series1 = array();
$series2 = array();
$series3 = array();
$series4 = array();

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$firmas = aplicacion('kyfb_mult_web_firmas',$hoy,'40 days');
$kyfbws = aplicacion('kyfb_mult_web_kyfbws',$hoy,'40 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($firmas)) {
      $series1['data'][] = $r1['tiempo_respuesta'];
      $series2['data'][] = $r1['peticiones'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($kyfbws)) {
      $series3['data'][] = $r2['tiempo_respuesta'];
      $series4['data'][] = $r2['peticiones'];
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
