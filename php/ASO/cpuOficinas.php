<?php
include("../conexion_e2e_process.php");

function busqueda($MAQUINA,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu
                            FROM    seguimiento_cx_maquina
                            WHERE   maquina = '".$MAQUINA."'
                            AND     canal = 'oficinas'
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
$series10 = array();

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$lpsro302CpuHoy = busqueda('lpsro302',$hoy);
$lpsrv309CpuHoy = busqueda('lpsrv309',$hoy);
$lpsro301CpuHoy = busqueda('lpsro301',$hoy);
$lpsrv328CpuHoy = busqueda('lpsrv328',$hoy);
$lpsrv329CpuHoy = busqueda('lpsrv329',$hoy);

$lpsro302CpuPasada = busqueda('lpsro302',$semana_pasada);
$lpsrv309CpuPasada = busqueda('lpsrv309',$semana_pasada);
$lpsro301CpuPasada = busqueda('lpsro301',$semana_pasada);
$lpsrv328CpuPasada = busqueda('lpsrv328',$semana_pasada);
$lpsrv329CpuPasada = busqueda('lpsrv329',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($lpsro302CpuPasada)) {
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($lpsrv309CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($lpsro301CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = mysql_fetch_array($lpsrv328CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = mysql_fetch_array($lpsrv329CpuPasada)) {
      $series5['data'][] = $r1['cpu'];
    }

while($r6 = mysql_fetch_array($lpsro302CpuHoy)) {
      $category['data'][] = $r6['fecha'];
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = mysql_fetch_array($lpsrv309CpuHoy)) {
      $series7['data'][] = $r7['cpu'];
    }
while($r8 = mysql_fetch_array($lpsro301CpuHoy)) {
      $series8['data'][] = $r8['cpu'];
    }
while($r9 = mysql_fetch_array($lpsrv328CpuHoy)) {
      $series9['data'][] = $r9['cpu'];
    }
while($r10 = mysql_fetch_array($lpsrv329CpuHoy)) {
      $series10['data'][] = $r10['cpu'];
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
array_push($datos,$series10);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
