<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../querys/informeMensual/informeMensual.php");

  $maxPeticiones = max_peti('ASOnet');
  $r8 = pg_fetch_assoc($maxPeticiones);
  $max_peti = $r8['max_peticiones'];
  $Fecha_peti = $r8['fecha'];
  $newFrom = $r8['fecha_max'];
  $TituloPeticiones = "Max. peticiones $Fecha_peti";

  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
  $to = date("Y-m-d");

  $titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";
  $gtHoy = busquedaPeticionesHoy('GTnet',$newToF,$newTo, 'Throughput');
  $servicioHoy = busquedaPeticionesHoy('ASOnet',$newToF,$newTo, 'Throughput');

  $gtPasada = busquedaPeticiones('GTnet', $newFrom, 'Throughput');
  $servicioPasada = busquedaPeticiones('ASOnet', $newFrom, 'Throughput');

  /*Recuperación datos*/
  $category['name'] = 'fecha';

  while($r1 = pg_fetch_assoc($gtPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
        $series5['data'][] = $max_peti;
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
