<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryPeticiones.php");

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

  /*gestion fechas*/
  if(date("Y-m-d")==$newTo){
    $newToF = date("Y-m-d 00:00");
    $newTo = date("Y-m-d H:i", strtotime('-15 minute'));
    $particularesHoy = busquedaHoy('kqof_particulares',$newToF,$newTo,'Throughput');
    $globalHoy = busquedaHoy('kqof_posicionGlobal',$newToF,$newTo,'Throughput');
    $KQOFHoy = busquedaHoy('kqof_es_web',$newToF,$newTo,'Throughput');
  }
  else {
    $particularesHoy = busqueda('kqof_particulares',$newTo,'Throughput');
    $globalHoy = busqueda('kqof_posicionGlobal',$newTo,'Throughput');
    $KQOFHoy = busqueda('kqof_es_web',$newTo,'Throughput');
  }
  $particularesPasada = busqueda('kqof_particulares',$newFrom,'Throughput');
  $globalPasada = busqueda('kqof_posicionGlobal',$newFrom,'Throughput');
  $KQOFPasada = busqueda('kqof_es_web',$newFrom,'Throughput');

  $maxPeticiones = max_peti('Throughput kqof');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  $r8 = pg_fetch_assoc($maxPeticiones);
  $max_peti['value'] = $r8['max_peticiones'];

  while($r1 = pg_fetch_assoc($particularesPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
      }
  while($r2 = pg_fetch_assoc($globalPasada)) {
        $series2['data'][] = $r2['peticiones'];
      }
  while($r3 = pg_fetch_assoc($KQOFPasada)) {
        $series3['data'][] = $r3['peticiones'];
        $series7['data'][] = $max_peti['value'];
      }
  while($r4 = pg_fetch_assoc($particularesHoy)) {
        $series4['data'][] = $r4['peticiones'];
      }
  while($r5 = pg_fetch_assoc($globalHoy)) {
        $series5['data'][] = $r5['peticiones'];
      }
  while($r6 = pg_fetch_assoc($KQOFHoy)) {
        $series6['data'][] = $r6['peticiones'];
      }

  /*Carga del array del Json*/
  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$series5);
  array_push($datos,$series6);
  array_push($datos,$series7);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);


?>
