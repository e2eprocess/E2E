<?php
require_once("../conexion_e2e_process.php");
require_once("../queryPeticiones.php");

/*Recuperar variables de sesión que contienen las fechas a comparar*/
session_start();
$from = $_SESSION["fechaFromNet"];
$newFrom = date("Y-m-d", strtotime($from));
//$newFrom = date("Y-m-d 00:00", strtotime($from));
$to=$_SESSION["fechaToNet"];
$newTo = date("Y-m-d", strtotime($to));
//$newTo = date("Y-m-d 23:59", strtotime($to));

/*gestion fechas*/
if(date("Y-m-d")==$newTo){
  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  //$peticionesHoy = busquedaHoy('apx',$newToF,$newTo, 'Throughput');
  $peticionesHoy = busquedaHoy2('APX%',$newToF,$newTo,'Throughput');
}else{
  //$peticionesHoy = busqueda('apx',$newTo, 'Throughput');
  $peticionesHoy = busqueda2('APX%',$newTo, 'Throughput');
}

/*Declaración variables*/
//$peticionesPasada = busqueda('apx', $newFrom, 'Throughput');
$peticionesPasada = busqueda2('APX%', $newFrom, 'Throughput');
$maxPeticiones = max_peti('apx acumulado');

$r8 = pg_fetch_assoc($maxPeticiones);
$max_peti = $r8['max_peticiones'];
$Fecha_peti = $r8['fecha'];
$TituloPeticiones = "Max. peticiones $Fecha_peti";

$category['name'] = 'fecha';
$titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

while($r1  = pg_fetch_assoc($peticionesPasada)) {
      $category['data'][] = $r1['fecha'];
      $series1['data'][] = $r1['peticiones'];
      $series4['data'][] = $max_peti;
    }

while($r2 = pg_fetch_assoc($peticionesHoy)) {
      $category['data'][] = $r2['fecha'];
      $series2['data'][] = $r2['peticiones'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$titulo);
array_push($datos,$series4);
array_push($datos,$TituloPeticiones);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
