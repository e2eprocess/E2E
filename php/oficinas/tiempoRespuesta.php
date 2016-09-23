<?php
include("../conexion_e2e_process.php");

function busqueda($CANAL,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    Tiempo_respuesta
                            FROM    seguimiento_cx_canal
                            WHERE   canal like '".$CANAL."'
                            AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 24 HOUR)
                            AND     fecha <= '".$FECHA_QUERY."'");

  return $resultado;

}

$category = array();
$series1 = array();
$series2 = array();
$series3 = array();
$series4 = array();

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$ncocHoy = busqueda('ncoc',$hoy);
$eeccHoy = busqueda('eecc',$hoy);

$ncocPasada = busqueda('ncoc',$semana_pasada);
$eeccPasada = busqueda('eecc',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($ncocPasada)) {
      $series1['data'][] = $r1['Tiempo_respuesta'];
    }
while($r2 = mysql_fetch_array($eeccPasada)) {
      $series2['data'][] = $r2['Tiempo_respuesta'];
    }

while($r3 = mysql_fetch_array($ncocHoy)) {
      $category['data'][] = $r3['fecha'];
      $series3['data'][] = $r3['Tiempo_respuesta'];
    }
while($r4 = mysql_fetch_array($eeccHoy)) {
      $series4['data'][] = $r4['Tiempo_respuesta'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
