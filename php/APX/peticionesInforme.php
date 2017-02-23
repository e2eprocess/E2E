<?php
require_once("../conexion_e2e_process.php");
require_once("../querys/informeMensual/informeMensual.php");

$maxPeticiones = max_peti('apx');
$r8 = pg_fetch_assoc($maxPeticiones);
$max_peti = $r8['max_peticiones'];
$Fecha_peti = $r8['fecha'];
$newFrom = $r8['fecha_max'];
$TituloPeticiones = "Max. peticiones $Fecha_peti";

$newToF = date("Y-m-d 00:00");
$newTo = date("Y-m-d H:i", strtotime('-20 minute'));
$to = date("Y-m-d");

$titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

$peticionesHoy = busquedaPeticionesHoy('apx',$newToF,$newTo, 'Throughput');
$peticionesPasada = busquedaPeticiones('apx', $newFrom, 'Throughput');

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($peticionesPasada)) {
      $category['data'][] = $r1['fecha'];
      $series1['data'][] = $r1['peticiones'];
      $series3['data'][] = $max_peti;
    }

while($r2 = pg_fetch_assoc($peticionesHoy)) {
      $category['data'][] = $r2['fecha'];
      $series2['data'][] = $r2['peticiones'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$titulo);
array_push($datos,$TituloPeticiones);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
