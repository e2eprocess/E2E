<?php
include("../conexion_e2e_process.php");

function busqueda($MAQUINA,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu
                            FROM    seguimiento_cx_maquina
                            WHERE   maquina = '".$MAQUINA."'
                            AND     canal = 'cash'
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

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$apbad022CpuHoy = busqueda('apbad022',$hoy);
$apbad023CpuHoy = busqueda('apbad023',$hoy);
$apbad024CpuHoy = busqueda('apbad024',$hoy);
$apbad026CpuHoy = busqueda('apbad026',$hoy);

$apbad022CpuPasada = busqueda('apbad022',$semana_pasada);
$apbad023CpuPasada = busqueda('apbad023',$semana_pasada);
$apbad024CpuPasada = busqueda('apbad024',$semana_pasada);
$apbad026CpuPasada = busqueda('apbad026',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($apbad022CpuPasada)) {
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($apbad023CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($apbad024CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = mysql_fetch_array($apbad026CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }

while($r5 = mysql_fetch_array($apbad022CpuHoy)) {
      $category['data'][] = $r5['fecha'];
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = mysql_fetch_array($apbad023CpuHoy)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = mysql_fetch_array($apbad024CpuHoy)) {
      $series7['data'][] = $r7['cpu'];
    }
while($r8 = mysql_fetch_array($apbad026CpuHoy)) {
      $series8['data'][] = $r8['cpu'];
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

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
