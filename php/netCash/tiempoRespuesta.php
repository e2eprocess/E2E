<?php
include("../conexion_e2e_process.php");

function busqueda($CANAL,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    Tiempo_respuesta
                            FROM    seguimiento_cx_canal
                            WHERE   canal = '".$CANAL."'
                            AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 24 HOUR)
                            AND     fecha <= '".$FECHA_QUERY."'");

  return $resultado;

}

$category = array();
$series1 = array();
$series2 = array();

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$tiempoHoy = busqueda('cash',$hoy);
$tiempoPasada = busqueda('cash', $semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($tiempoPasada)) {
      $series1['data'][] = $r1['Tiempo_respuesta'];
    }
while($r2 = mysql_fetch_array($tiempoHoy)) {
      $category['data'][] = $r2['fecha'];
      $series2['data'][] = $r2['Tiempo_respuesta'];
    }


$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);


print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
