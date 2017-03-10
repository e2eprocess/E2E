<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryPeticiones.php");

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
    $gtHoy = busquedaHoy('GTmobile',$newToF,$newTo, 'Throughput');
    $servicioHoy = busquedaHoy('ASOmobile',$newToF,$newTo, 'Throughput');

  }
  else {
    $gtHoy = busqueda('GTmobile',$newTo, 'Throughput');
    $servicioHoy = busqueda('ASOmobile',$newTo, 'Throughput');

  }

  $gtPasada = busqueda('GTmobile', $newFrom, 'Throughput');
  $servicioPasada = busqueda('ASOmobile', $newFrom, 'Throughput');
  $maxPeticiones = max_peti('ASOmobile');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  $r8 = pg_fetch_assoc($maxPeticiones);
  $max_peti['value'] = $r8['max_peticiones'];
  $Fecha_peti = $r8['fecha'];
  $TituloPeticiones = "Max. peticiones $Fecha_peti";

  while($r1 = pg_fetch_assoc($gtPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
        $series5['data'][] = $max_peti['value'];
      }
  while($r2 = pg_fetch_assoc($servicioPasada)) {
        $series2['data'][] = $r2['peticiones'];
      }

  while($r3 = pg_fetch_assoc($gtHoy)) {
        $series3['data'][] = $r3['peticiones'];

      }
  while($r4 = pg_fetch_assoc($servicioHoy)) {
        $series4['data'][] = $r4['peticiones'];
      }

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$series4);
  array_push($datos,$titulo);
  array_push($datos,$series5);
  array_push($datos,$TituloPeticiones);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
