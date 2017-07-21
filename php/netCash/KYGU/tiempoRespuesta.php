<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryTime.php");

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
  if(date("Y-m-d")==$newTo){
    $newToF = date("Y-m-d 00:00");
    $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
    $frontusuarioHoy = busquedaHoy('kygu_mult_web_frontusuario',$newToF,$newTo,'Time');
    $serviciousuarioHoy = busquedaHoy('kygu_mult_web_serviciosusuario',$newToF,$newTo,'Time');
  }
  else {
    $frontusuarioHoy = busqueda('kygu_mult_web_frontusuario',$newTo,'Time');
    $serviciousuarioHoy = busqueda('kygu_mult_web_serviciosusuario',$newTo,'Time');
  }
  $frontusuarioPasada = busqueda('kygu_mult_web_frontusuario', $newFrom,'Time');
  $serviciousuarioPasada = busqueda('kygu_mult_web_serviciosusuario', $newFrom,'Time');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($frontusuarioPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['tiempo_respuesta'];
      }
  while($r2 = pg_fetch_assoc($serviciousuarioPasada)) {
        $series2['data'][] = $r2['tiempo_respuesta'];
      }

  while($r3 = pg_fetch_assoc($frontusuarioHoy)) {
        $series3['data'][] = $r3['tiempo_respuesta'];
      }
  while($r4 = pg_fetch_assoc($serviciousuarioHoy)) {
        $series4['data'][] = $r4['tiempo_respuesta'];
      }



  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
