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
$series6 = array();
$series7 = array();
$series8 = array();
$series9 = array();

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$particularesHoy = busqueda('%particulares%',$hoy);
$globalHoy = busqueda('%global%',$hoy);
$KQOFHoy = busqueda('%KQOF%',$hoy);
$pasaporteHoy = busqueda('%pasaporte%',$hoy);

$particularesPasada = busqueda('%Particulares%',$semana_pasada);
$globalPasada = busqueda('%global%',$semana_pasada);
$KQOFPasada = busqueda('%KQOF%',$semana_pasada);
$pasaportePasada = busqueda('%pasaporte%',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($particularesPasada)) {
      $series1['data'][] = $r1['peticiones'];
    }
while($r2 = mysql_fetch_array($globalPasada)) {
      $series2['data'][] = $r2['peticiones'];
    }
while($r3 = mysql_fetch_array($KQOFPasada)) {
      $series3['data'][] = $r3['peticiones'];
    }
while($r4 = mysql_fetch_array($pasaportePasada)) {
      $series4['data'][] = $r4['peticiones'];
    }

while($r5 = mysql_fetch_array($particularesHoy)) {
      $category['data'][] = $r5['fecha'];
      $series5['data'][] = $r5['peticiones'];
    }
while($r6 = mysql_fetch_array($globalHoy)) {
      $series6['data'][] = $r6['peticiones'];
    }
while($r7 = mysql_fetch_array($KQOFHoy)) {
      $series7['data'][] = $r7['peticiones'];
      $series9['data'][] = $r7['max_peticiones'];
    }
while($r8 = mysql_fetch_array($pasaporteHoy)) {
      $series8['data'][] = $r8['peticiones'];
    }


$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);
array_push($datos,$series5);
array_push($datos,$series6);
array_push($datos,$series7);
array_push($datos,$series8);
array_push($datos,$series9);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
