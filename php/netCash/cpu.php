<?php
  require_once("../conexion_e2e_process.php");

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
                              AND     canal = 'cash'
                              AND     fecha like '".$FECHA_QUERY."%'");
    return $resultado;
  }

  /*Declaracion de arrays json*/
  $category = array();
  $titulo = array();
  $series1 = array();
  $series2 = array();
  $series3 = array();
  $series4 = array();
  $series5 = array();
  $series6 = array();
  $series7 = array();
  $series8 = array();

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  $apbad022CpuHoy = busqueda('apbad022',$newTo);
  $apbad023CpuHoy = busqueda('apbad023',$newTo);
  $apbad024CpuHoy = busqueda('apbad024',$newTo);
  $apbad026CpuHoy = busqueda('apbad026',$newTo);

  $apbad022CpuPasada = busqueda('apbad022',$newFrom);
  $apbad023CpuPasada = busqueda('apbad023',$newFrom);
  $apbad024CpuPasada = busqueda('apbad024',$newFrom);
  $apbad026CpuPasada = busqueda('apbad026',$newFrom);

  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($apbad022CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($apbad023CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($apbad024CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($apbad026CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }

  while($r5 = pg_fetch_assoc($apbad022CpuHoy)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($apbad023CpuHoy)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($apbad024CpuHoy)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($apbad026CpuHoy)) {
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
