<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../querys/informeMensual/informeMensual.php");

  $maxPeticiones = max_peti('ASOnet');
  $r8 = pg_fetch_assoc($maxPeticiones);
  $newFrom = $r8['fecha_max'];
  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  $to = date("Y-m-d");

  $titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

  $gtHoy = busquedaTimeHoy('GTnet',$newToF,$newTo, 'Time');
  $servicioHoy = busquedaTimeHoy('ASOnet',$newToF,$newTo, 'Time');

  $gtPasada = busquedaTime('GTnet', $newFrom, 'Time');
  $servicioPasada = busquedaTime('ASOnet', $newFrom, 'Time');

  /*Recuperación datos*/
  $category['name'] = 'fecha';

  while($r1 = pg_fetch_assoc($gtPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['tiempo_respuesta'];
      }
  while($r2 = pg_fetch_assoc($servicioPasada)) {
        $series2['data'][] = $r2['tiempo_respuesta'];
      }
  while($r3 = pg_fetch_assoc($gtHoy)) {
        $series3['data'][] = $r3['tiempo_respuesta'];
      }
  while($r4 = pg_fetch_assoc($servicioHoy)) {
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
