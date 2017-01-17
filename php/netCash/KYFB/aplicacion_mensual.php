<?php
require_once("../../conexion_e2e_process.php");

function busqueda($CANAL,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y')as dia,
                                    avg(tiempo_respuesta) as tiempo_respuesta,
                                    sum(peticiones) as peticiones
                            FROM    seguimiento_cx_canal
                            WHERE   canal like '".$CANAL."'
                            AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 40 DAY)
                            AND     fecha <= '".$FECHA_QUERY."'
                            GROUP BY  dia
                            ORDER BY  fecha");

  return $resultado;

}

$category = array();
$series1 = array();
$series2 = array();
$series3 = array();
$series4 = array();

$minuto = 10;

if(date("i")<$minuto){
  $hoy = date("Y-m-d H", strtotime('-2 hour'));
}else{
  $hoy = date("Y-m-d H", strtotime('-1 hour'));
}

$firmas = busqueda('kyfb%firmas%',$hoy);
$kyfbws = busqueda('kyfb%kyfbws%',$hoy);

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($firmas)) {
      $series1['data'][] = $r1['tiempo_respuesta'];
      $series2['data'][] = $r1['peticiones'];
      $category['data'][] = $r1['dia'];
    }
while($r2  = pg_fetch_assoc($kyfbws)) {
      $series3['data'][] = $r2['tiempo_respuesta'];
      $series4['data'][] = $r2['peticiones'];
    }


$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);


print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
