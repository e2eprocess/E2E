<?php
  include("../../conexion_e2e_process.php");

  /* Query fecha menos 24 horas
  function busqueda($CANAL,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                      Tiempo_respuesta
                              FROM    seguimiento_cx_canal
                              WHERE   canal like '".$CANAL."'
                              AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 24 HOUR)
                              AND     fecha <= '".$FECHA_QUERY."'");
    return $resultado;
  }*/

  /*query*/
  function busqueda($CANAL,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%k:%i')as fecha,
                                      Tiempo_respuesta
                              FROM    seguimiento_cx_canal
                              WHERE   canal = '".$CANAL."'
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

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  $serviciosHoy = busqueda('kyos_mult_web_servicios_02',$newTo);
  $posicioncuentasHoy = busqueda('kyos_mult_web_posicioncuentas_01',$newTo);

  $serviciosPasada = busqueda('kyos_mult_web_servicios_02', $newFrom);
  $posicioncuentasPasada = busqueda('kyos_mult_web_posicioncuentas_01', $newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = mysql_fetch_array($serviciosPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['Tiempo_respuesta'];
      }
  while($r2 = mysql_fetch_array($posicioncuentasPasada)) {
        $series2['data'][] = $r2['Tiempo_respuesta'];
      }

  while($r3 = mysql_fetch_array($serviciosHoy)) {
        $series3['data'][] = $r3['Tiempo_respuesta'];
      }
  while($r4 = mysql_fetch_array($posicioncuentasHoy)) {
        $series4['data'][] = $r4['Tiempo_respuesta'];
      }



  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
