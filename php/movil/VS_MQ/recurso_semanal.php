<?php
require_once("../../conexion_e2e_process.php");

function busqueda($CANAL,$MAQUINA,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu
                                    /*cpu_avg*/
                            FROM    seguimiento_cx_maquina
                            WHERE   canal = '".$CANAL."'
                            AND     maquina = '".$MAQUINA."'
                            AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 10 DAY)
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

$minuto = 10;

if(date("i")<$minuto){
  $hoy = date("Y-m-d H", strtotime('-2 hour'));
}else{
  $hoy = date("Y-m-d H", strtotime('-1 hour'));
}

$apbad002 = busqueda('movil','apbad002',$hoy);
$apbad003 = busqueda('movil','apbad003',$hoy);
$apbad004 = busqueda('movil','apbad004',$hoy);
$apbad006 = busqueda('movil','apbad006',$hoy);


$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($apbad002)) {
      /*$series1['data'][] = $r1['cpu_avg'];*/
      $series5['data'][] = $r1['cpu'];
      $category['data'][] = $r1['fecha'];
    }
while($r2  = pg_fetch_assoc($apbad003)) {
      /*$series2['data'][] = $r2['cpu_avg'];*/
      $series6['data'][] = $r2['cpu'];
    }
while($r3  = pg_fetch_assoc($apbad004)) {
      /*$series3['data'][] = $r3['cpu_avg'];*/
      $series7['data'][] = $r3['cpu'];
    }
while($r4  = pg_fetch_assoc($apbad006)) {
      /*$series4['data'][] = $r4['cpu_avg'];*/
      $series8['data'][] = $r4['cpu'];
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
