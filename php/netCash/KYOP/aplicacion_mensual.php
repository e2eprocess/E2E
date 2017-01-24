<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinforme.php");

$category = array();
$series1 = array();
$series2 = array();

$hoy= date("Y-m-d H:m", strtotime('-20 minute'));

$kyop_mult_web_kyoppresentationTime = tiempo('kyop_mult_web_kyoppresentation',$hoy,'40 days');
$kyop_mult_web_kyoppresentationPeti = peticiones('kyop_mult_web_kyoppresentation',$hoy,'40 days');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($kyop_mult_web_kyoppresentationTime)) {
      $series1['data'][] = $r1['tiempo_respuesta'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($kyop_mult_web_kyoppresentationPeti)) {
      $series2['data'][] = $r2['peticiones'];
    }


$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);


print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
