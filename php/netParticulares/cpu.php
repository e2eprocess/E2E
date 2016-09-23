<?php
include("../conexion_e2e_process.php");

function busqueda($MAQUINA,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu
                            FROM    seguimiento_cx_maquina
                            WHERE   maquina = '".$MAQUINA."'
                            AND     canal = 'net'
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
$semana_pasada = date($hoy, strtotime('-7 day'));

$apbad002CpuHoy = busqueda('apbad002',$hoy);
$apbad003CpuHoy = busqueda('apbad003',$hoy);
$apbad004CpuHoy = busqueda('apbad004',$hoy);
$apbad006CpuHoy = busqueda('apbad006',$hoy);

$apbad002CpuPasada = busqueda('apbad002',$semana_pasada);
$apbad003CpuPasada = busqueda('apbad003',$semana_pasada);
$apbad004CpuPasada = busqueda('apbad004',$semana_pasada);
$apbad006CpuPasada = busqueda('apbad006',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($apbad002CpuPasada)) {
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($apbad003CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($apbad004CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = mysql_fetch_array($apbad006CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }

while($r5 = mysql_fetch_array($apbad002CpuHoy)) {
      $category['data'][] = $r5['fecha'];
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = mysql_fetch_array($apbad003CpuHoy)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = mysql_fetch_array($apbad004CpuHoy)) {
      $series7['data'][] = $r7['cpu'];
    }
while($r8 = mysql_fetch_array($apbad006CpuHoy)) {
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
