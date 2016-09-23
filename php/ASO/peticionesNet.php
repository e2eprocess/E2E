<?php
include("../conexion_e2e_process.php");

function busqueda($CANAL,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    peticiones,
                                    max_peticiones
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
$series5 = array();

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$gtHoy = busqueda('%gtnet%',$hoy);
$servicioHoy = busqueda('%ASOnet%',$hoy);

$gtPasada = busqueda('%gtnet%', $semana_pasada);
$servicioPasada = busqueda('%ASOnet%', $semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($gtPasada)) {
      $series1['data'][] = $r1['peticiones'];
    }
while($r2 = mysql_fetch_array($servicioPasada)) {
      $series2['data'][] = $r2['peticiones'];
    }

while($r3 = mysql_fetch_array($gtHoy)) {
      $category['data'][] = $r3['fecha'];
      $series3['data'][] = $r3['peticiones'];
      $series5['data'][] = $r3['max_peticiones'];
    }
while($r4 = mysql_fetch_array($servicioHoy)) {
      $series4['data'][] = $r4['peticiones'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);
array_push($datos,$series5);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
