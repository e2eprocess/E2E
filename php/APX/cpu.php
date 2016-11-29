<?php
include("../conexion_e2e_process.php");

/* Query fecha menos 24 horas
function busqueda($MAQUINA,$FECHA_QUERY){
  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu
                            FROM    seguimiento_cx_maquina
                            WHERE   maquina = '".$MAQUINA."'
                            AND     canal = 'net'
                            AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 24 HOUR)
                            AND     fecha <= '".$FECHA_QUERY."'");
  return $resultado;
}*/

/*query*/
function busqueda($MAQUINA,$FECHA_QUERY){
  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%k:%i')as fecha,
                                    cpu
                            FROM    seguimiento_cx_maquina
                            WHERE   maquina = '".$MAQUINA."'
                            AND     canal = 'apx'
                            AND     fecha like '".$FECHA_QUERY."%'");
  return $resultado;
}

/*Declaracion de arrays json*/
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

/*Recuperar variables de sesión que contienen las fechas a comparar*/
session_start();
$from = $_SESSION["fechaFromNet"];
$newFrom = date("Y-m-d", strtotime($from));
$to=$_SESSION["fechaToNet"];
$newTo = date("Y-m-d", strtotime($to));

/*Declaración variables*/
$lppxo301CpuHoy = busqueda('lppxo301',$newTo);
$lppxo302CpuHoy = busqueda('lppxo302',$newTo);
$lppxo303CpuHoy = busqueda('lppxo303',$newTo);
$lppxo304CpuHoy = busqueda('lppxo304',$newTo);
$lppxo305CpuHoy = busqueda('lppxo305',$newTo);
$lppxo309CpuHoy = busqueda('lppxo309',$newTo);
$lppxo310CpuHoy = busqueda('lppxo310',$newTo);

$lppxo301CpuPasada = busqueda('lppxo301',$newFrom);
$lppxo302CpuPasada = busqueda('lppxo302',$newFrom);
$lppxo303CpuPasada = busqueda('lppxo303',$newFrom);
$lppxo304CpuPasada = busqueda('lppxo304',$newFrom);
$lppxo305CpuPasada = busqueda('lppxo305',$newFrom);
$lppxo309CpuPasada = busqueda('lppxo309',$newFrom);
$lppxo310CpuPasada = busqueda('lppxo310',$newFrom);

/*Recuperación datos*/
$category['name'] = 'fecha';
$titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

while($r1 = mysql_fetch_array($lppxo301CpuPasada)) {
      $category['data'][] = $r1['fecha'];
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = mysql_fetch_array($lppxo302CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = mysql_fetch_array($lppxo303CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = mysql_fetch_array($lppxo304CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = mysql_fetch_array($lppxo305CpuPasada)) {
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = mysql_fetch_array($lppxo309CpuPasada)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = mysql_fetch_array($lppxo310CpuPasada)) {
      $series7['data'][] = $r7['cpu'];
    }

while($r8 = mysql_fetch_array($lppxo301CpuHoy)) {
      $series8['data'][] = $r8['cpu'];
    }
while($r9 = mysql_fetch_array($lppxo302CpuHoy)) {
      $series9['data'][] = $r9['cpu'];
    }
while($r10 = mysql_fetch_array($lppxo303CpuHoy)) {
      $series10['data'][] = $r10['cpu'];
    }
while($r11 = mysql_fetch_array($lppxo304CpuHoy)) {
      $series11['data'][] = $r11['cpu'];
    }
while($r12 = mysql_fetch_array($lppxo305CpuHoy)) {
      $series12['data'][] = $r12['cpu'];
    }
while($r13 = mysql_fetch_array($lppxo309CpuHoy)) {
      $series13['data'][] = $r13['cpu'];
    }
while($r14 = mysql_fetch_array($lppxo310CpuHoy)) {
      $series14['data'][] = $r14['cpu'];
    }

/*Carga del array del Json*/
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
array_push($datos,$titulo);

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
