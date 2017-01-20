<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryPeticiones.php");

  /*Declaracion de arrays json*/
  $category = array();
  $series1 = array();
  $titulo = array();
  $series2 = array();
  $series3 = array();

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
    $ncocHoy = busquedaHoy('ncoc_es_web',$newToF,$newTo,'Throughput');
  }
  else {
    $ncocHoy = busqueda('ncoc_es_web',$newTo,'Throughput');
  }
  $ncocPasada = busqueda('ncoc_es_web',$newFrom,'Throughput');
  $maxPeticiones = max_peti('ncoc_es_web');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  $r8 = pg_fetch_assoc($maxPeticiones);
  $max_peti['value'] = $r8['max_peticiones'];
  $Fecha_peti = $r8['fecha'];
  $TituloPeticiones = "Max. peticiones $Fecha_peti";

  while($r1 = pg_fetch_assoc($ncocPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
        $series3['data'][] = $max_peti['value'];
      }

  while($r2 = pg_fetch_assoc($ncocHoy)) {
        $series2['data'][] = $r2['peticiones'];
      }

  /*Carga del array del Json*/
  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$titulo);
  array_push($datos,$TituloPeticiones);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
