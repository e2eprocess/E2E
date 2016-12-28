<?php
  include("conexion_e2e_process.php");

  function busqueda($CANAL){
    $resultado = mysql_query("SELECT  (UNIX_TIMESTAMP(fecha) * 1000) as fecha,
                                      tiempo_respuesta,
                                      peticiones
                              FROM    seguimiento_cx_canal
                              WHERE   canal = '".$CANAL."'");
    return $resultado;
  }

  $series1 = array();

  $query = busqueda('apx');

  while($r1 = mysql_fetch_array($query)) {
    $series1[] = [$r1['fecha'], $r1['peticiones'], $r1['tiempo_respuesta']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
