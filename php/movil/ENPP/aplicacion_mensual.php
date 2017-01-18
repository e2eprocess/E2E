<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinforme.php");

$category = array();
$series1 = array();
$series2 = array();
$series3 = array();
$series4 = array();

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$mobility = aplicacion('enpp_mult_web',$hoy,'40 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($mobility)) {
      $series1['data'][] = $r1['tiempo_respuesta'];
      $series2['data'][] = $r1['peticiones'];
      $category['data'][] = $r1['fecha'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
