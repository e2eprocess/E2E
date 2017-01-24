<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryPeticiones.php");

  /*Declaracion de arrays json*/
  $category = array();
  $titulo = array();
  $series1 = array();
  $series2 = array();
  $series3 = array();
  $series4 = array();
  $series5 = array();

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  /*gestion fechas*/
  if(date("Y-m-d")==$newTo){
    $newToF = date("Y-m-d 00:00");
    $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
    $frontusuarioHoy = busquedaHoy('kyfb_mult_web_firmas',$newToF,$newTo,'Throughput');
    $serviciousuarioHoy = busquedaHoy('kyfb_mult_web_kyfbws',$newToF,$newTo,'Throughput');

  }
  else {
    $frontusuarioHoy = busqueda('kyfb_mult_web_firmas',$newTo,'Throughput');
    $serviciousuarioHoy = busqueda('kyfb_mult_web_kyfbws',$newTo,'Throughput');
  }
  $frontusuarioPasada = busqueda('kyfb_mult_web_firmas',$newFrom,'Throughput');
  $serviciousuarioPasada = busqueda('kyfb_mult_web_kyfbws',$newFrom,'Throughput');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($frontusuarioPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
      }
  while($r2 = pg_fetch_assoc($serviciousuarioPasada)) {
        $series2['data'][] = $r2['peticiones'];
      }

  while($r3 = pg_fetch_assoc($frontusuarioHoy)) {
        $series3['data'][] = $r3['peticiones'];
      }
  while($r4 = pg_fetch_assoc($serviciousuarioHoy)) {
        $series4['data'][] = $r4['peticiones'];
      }

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
