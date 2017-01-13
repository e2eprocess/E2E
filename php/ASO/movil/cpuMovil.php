<?php
  require_once("../../conexion_e2e_process.php");

  /* Query fecha menos 24 horas
  function busqueda($MAQUINA,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                      cpu
                              FROM    seguimiento_cx_maquina
                              WHERE   maquina = '".$MAQUINA."'
                              AND     canal = 'movil'
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
                              AND     canal = 'movil'
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
  $lpsrm302CpuHoy = busqueda('lpsrm302',$newTo);
  $lpsrv310CpuHoy = busqueda('lpsrv310',$newTo);
  $lpsrv311CpuHoy = busqueda('lpsrv311',$newTo);
  $lpsrv314CpuHoy = busqueda('lpsrv314',$newTo);
  $lpsrm301CpuHoy = busqueda('lpsrm301',$newTo);
  $lpsrv315CpuHoy = busqueda('lpsrv315',$newTo);
  $lpsrv316CpuHoy = busqueda('lpsrv316',$newTo);

  $lpsrm302CpuPasada = busqueda('lpsrm302',$newFrom);
  $lpsrv310CpuPasada = busqueda('lpsrv310',$newFrom);
  $lpsrv311CpuPasada = busqueda('lpsrv311',$newFrom);
  $lpsrv314CpuPasada = busqueda('lpsrv314',$newFrom);
  $lpsrm301CpuPasada = busqueda('lpsrm301',$newFrom);
  $lpsrv315CpuPasada = busqueda('lpsrv315',$newFrom);
  $lpsrv316CpuPasada = busqueda('lpsrv316',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($lpsrm302CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($lpsrv310CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($lpsrv311CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($lpsrv314CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($lpsrm301CpuPasada)) {
        $series5['data'][] = $r1['cpu'];
      }
  while($r6 = pg_fetch_assoc($lpsrv315CpuPasada)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($lpsrv316CpuPasada)) {
        $series7['data'][] = $r7['cpu'];
      }

  while($r8 = pg_fetch_assoc($lpsrm302CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = pg_fetch_assoc($lpsrv310CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($lpsrv311CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($lpsrv314CpuHoy)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($lpsrm301CpuHoy)) {
        $series12['data'][] = $r12['cpu'];
      }
  while($r13 = pg_fetch_assoc($lpsrv315CpuHoy)) {
        $series13['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($lpsrv316CpuHoy)) {
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
