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
    $serviciosHoy = busquedaHoy('kyos_mult_web_servicios',$newToF,$newTo,'Time');
    $posicioncuentasHoy = busquedaHoy('kyos_mult_web_posicioncuentas',$newToF,$newTo,'Time');
  }
  else {
    $serviciosHoy = busqueda('kyos_mult_web_servicios',$newTo,'Time');
    $posicioncuentasHoy = busqueda('kyos_mult_web_posicioncuentas',$newTo,'Time');
  }
  $serviciosPasada = busqueda('kyos_mult_web_servicios', $newFrom,'Time');
  $posicioncuentasPasada = busqueda('kyos_mult_web_posicioncuentas', $newFrom,'Time');
  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($serviciosPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['tiempo_respuesta'];
      }
  while($r2 = pg_fetch_assoc($posicioncuentasPasada)) {
        $series2['data'][] = $r2['tiempo_respuesta'];
      }

  while($r3 = pg_fetch_assoc($serviciosHoy)) {
        $series3['data'][] = $r3['tiempo_respuesta'];
      }
  while($r4 = pg_fetch_assoc($posicioncuentasHoy)) {
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
