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

$minuto = 22;
if(date("i")<$minuto){
  $hoy = date("Y-m-d H", strtotime('-2 hour'));
  $semana_pasada = date("Y-m-d H", strtotime('-170 hour'));
}else{
  $hoy = date("Y-m-d H", strtotime('-1 hour'));
  $semana_pasada = date("Y-m-d H", strtotime('-169 hour'));
}

$lpsrv306CpuHoy = busqueda('lpsrv306',$hoy);
$lpsrv325CpuHoy = busqueda('lpsrv325',$hoy);
$lpsrv305CpuHoy = busqueda('lpsrv305',$hoy);

$lpsrv306CpuPasada = busqueda('lpsrv306',$semana_pasada);
$lpsrv325CpuPasada = busqueda('lpsrv325',$semana_pasada);
$lpsrv305CpuPasada = busqueda('lpsrv305',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($lpsrv306CpuPasada)) {
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($lpsrv325CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($lpsrv305CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }

while($r4 = mysql_fetch_array($lpsrv306CpuHoy)) {
      $category['data'][] = $r4['fecha'];
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = mysql_fetch_array($lpsrv325CpuHoy)) {
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = mysql_fetch_array($lpsrv305CpuHoy)) {
      $series6['data'][] = $r6['cpu'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);
array_push($datos,$series5);
array_push($datos,$series6);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
