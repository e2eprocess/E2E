<?php
include("../conexion_e2e_process.php");

function busqueda($MAQUINA,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu
                            FROM    seguimiento_cx_maquina
                            WHERE   maquina = '".$MAQUINA."'
                            AND     canal = 'movil'
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
$series11 = array();
$series12 = array();
$series13 = array();
$series14 = array();

$minuto = 22;
if(date("i")<$minuto){
  $hoy = date("Y-m-d H", strtotime('-2 hour'));
  $semana_pasada = date("Y-m-d H", strtotime('-170 hour'));
}else{
  $hoy = date("Y-m-d H", strtotime('-1 hour'));
  $semana_pasada = date("Y-m-d H", strtotime('-169 hour'));
}

$lpsrm302CpuHoy = busqueda('lpsrm302',$hoy);
$lpsrv310CpuHoy = busqueda('lpsrv310',$hoy);
$lpsrv311CpuHoy = busqueda('lpsrv311',$hoy);
$lpsrv314CpuHoy = busqueda('lpsrv314',$hoy);
$lpsrm301CpuHoy = busqueda('lpsrm301',$hoy);
$lpsrv315CpuHoy = busqueda('lpsrv315',$hoy);
$lpsrv316CpuHoy = busqueda('lpsrv316',$hoy);

$lpsrm302CpuPasada = busqueda('lpsrm302',$semana_pasada);
$lpsrv310CpuPasada = busqueda('lpsrv310',$semana_pasada);
$lpsrv311CpuPasada = busqueda('lpsrv311',$semana_pasada);
$lpsrv314CpuPasada = busqueda('lpsrv314',$semana_pasada);
$lpsrm301CpuPasada = busqueda('lpsrm301',$semana_pasada);
$lpsrv315CpuPasada = busqueda('lpsrv315',$semana_pasada);
$lpsrv316CpuPasada = busqueda('lpsrv316',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($lpsrm302CpuPasada)) {
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($lpsrv310CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($lpsrv311CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = mysql_fetch_array($lpsrv314CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = mysql_fetch_array($lpsrm301CpuPasada)) {
      $series5['data'][] = $r1['cpu'];
    }
while($r6 = mysql_fetch_array($lpsrv315CpuPasada)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = mysql_fetch_array($lpsrv316CpuPasada)) {
      $series7['data'][] = $r7['cpu'];
    }

while($r8 = mysql_fetch_array($lpsrm302CpuHoy)) {
      $category['data'][] = $r8['fecha'];
      $series8['data'][] = $r8['cpu'];
    }
while($r9 = mysql_fetch_array($lpsrv310CpuHoy)) {
      $series9['data'][] = $r9['cpu'];
    }
while($r10 = mysql_fetch_array($lpsrv311CpuHoy)) {
      $series10['data'][] = $r10['cpu'];
    }
while($r11 = mysql_fetch_array($lpsrv314CpuHoy)) {
      $series11['data'][] = $r11['cpu'];
    }
while($r12 = mysql_fetch_array($lpsrm301CpuHoy)) {
      $series12['data'][] = $r12['cpu'];
    }
while($r13 = mysql_fetch_array($lpsrv315CpuHoy)) {
      $series13['data'][] = $r13['cpu'];
    }
while($r14 = mysql_fetch_array($lpsrv316CpuHoy)) {
      $series14['data'][] = $r14['cpu'];
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
array_push($datos,$series11);
array_push($datos,$series12);
array_push($datos,$series13);
array_push($datos,$series14);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
