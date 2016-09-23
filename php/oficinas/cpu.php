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
$series11 = array();
$series12 = array();
$series13 = array();
$series14 = array();

$hoy = date("Y-m-d H", strtotime('-1 hour'));
$semana_pasada = date("Y-m-d H", strtotime('-169 hour'));

$spnac005CpuHoy = busqueda('spnac005',$hoy);
$spnac006CpuHoy = busqueda('spnac006',$hoy);
$spnac007CpuHoy = busqueda('spnac007',$hoy);
$spnac008CpuHoy = busqueda('spnac008',$hoy);
$spnac009CpuHoy = busqueda('spnac009',$hoy);
$spnac010CpuHoy = busqueda('spnac010',$hoy);
$spnac012CpuHoy = busqueda('spnac012',$hoy);

$spnac005CpuPasada = busqueda('spnac005',$semana_pasada);
$spnac006CpuPasada = busqueda('spnac006',$semana_pasada);
$spnac007CpuPasada = busqueda('spnac007',$semana_pasada);
$spnac008CpuPasada = busqueda('spnac008',$semana_pasada);
$spnac009CpuPasada = busqueda('spnac009',$semana_pasada);
$spnac010CpuPasada = busqueda('spnac010',$semana_pasada);
$spnac012CpuPasada = busqueda('spnac012',$semana_pasada);

$category['name'] = 'fecha';

while($r1 = mysql_fetch_array($spnac005CpuPasada)) {
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($spnac006CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($spnac007CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = mysql_fetch_array($spnac008CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = mysql_fetch_array($spnac009CpuPasada)) {
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = mysql_fetch_array($spnac010CpuPasada)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = mysql_fetch_array($spnac012CpuPasada)) {
      $series7['data'][] = $r7['cpu'];
    }

while($r8 = mysql_fetch_array($spnac005CpuHoy)) {
      $category['data'][] = $r8['fecha'];
      $series8['data'][] = $r8['cpu'];
    }
while($r9 = mysql_fetch_array($spnac006CpuHoy)) {
      $series9['data'][] = $r9['cpu'];
    }
while($r10 = mysql_fetch_array($spnac007CpuHoy)) {
      $series10['data'][] = $r10['cpu'];
    }
while($r11 = mysql_fetch_array($spnac008CpuHoy)) {
      $series11['data'][] = $r11['cpu'];
    }
while($r12 = mysql_fetch_array($spnac009CpuHoy)) {
      $series12['data'][] = $r12['cpu'];
    }
while($r13 = mysql_fetch_array($spnac010CpuHoy)) {
      $series13['data'][] = $r13['cpu'];
    }
while($r14 = mysql_fetch_array($spnac012CpuHoy)) {
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
