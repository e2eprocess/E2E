<?php
  include("../../conexion_e2e_process.php");

  /* Query fecha menos 24 horas
  function busqueda($MAQUINA,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                      cpu
                              FROM    seguimiento_cx_maquina
                              WHERE   maquina = '".$MAQUINA."'
                              AND     canal = 'oficinas'
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
                              AND     canal = 'oficinas'
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

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  $lpsro302CpuHoy = busqueda('lpsro302',$newTo);
  $lpsrv309CpuHoy = busqueda('lpsrv309',$newTo);
  $lpsro301CpuHoy = busqueda('lpsro301',$newTo);
  $lpsrv328CpuHoy = busqueda('lpsrv328',$newTo);
  $lpsrv329CpuHoy = busqueda('lpsrv329',$newTo);

  $lpsro302CpuPasada = busqueda('lpsro302',$newFrom);
  $lpsrv309CpuPasada = busqueda('lpsrv309',$newFrom);
  $lpsro301CpuPasada = busqueda('lpsro301',$newFrom);
  $lpsrv328CpuPasada = busqueda('lpsrv328',$newFrom);
  $lpsrv329CpuPasada = busqueda('lpsrv329',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = mysql_fetch_array($lpsro302CpuPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = mysql_fetch_array($lpsrv309CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = mysql_fetch_array($lpsro301CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = mysql_fetch_array($lpsrv328CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = mysql_fetch_array($lpsrv329CpuPasada)) {
        $series5['data'][] = $r1['cpu'];
      }

  while($r6 = mysql_fetch_array($lpsro302CpuHoy)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = mysql_fetch_array($lpsrv309CpuHoy)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = mysql_fetch_array($lpsro301CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = mysql_fetch_array($lpsrv328CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = mysql_fetch_array($lpsrv329CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
