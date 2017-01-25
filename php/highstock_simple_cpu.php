<?php
  include("conexion_e2e_process.php");

  function busqueda($CANAL){
    $resultado = mysql_query("SELECT  (UNIX_TIMESTAMP(fecha) * 1000) as fecha,
                                      cpu
                              FROM    seguimiento_cx_maquina
                              WHERE   canal = '".$CANAL."'");
    return $resultado;
  }

  $datos = array();
  $series1 = array();

  $query = busqueda('apx');

  while($r1 = mysql_fetch_array($query)) {
    $series1[] = [$r1['fecha'], $r1['cpu']];
    }

  array_push($datos,$series1);

  print json_encode($series1, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
