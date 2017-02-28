<?php
  require_once("../conexion_e2e_process.php");
  require_once("../querys/informeMensual/informeMensual.php");

  $maxPeticiones = max_peti('eecc');
  $r8 = pg_fetch_assoc($maxPeticiones);
  $newFrom = $r8['fecha_max'];

  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  $to = date("Y-m-d");

  $titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

  $spnac006CpuHoy = busquedaMaquinaHoy('spnac006',$newToF,$newTo);
  $spnac008CpuHoy = busquedaMaquinaHoy('spnac008',$newToF,$newTo);
  $spnac010CpuHoy = busquedaMaquinaHoy('spnac010',$newToF,$newTo);
  $spnac012CpuHoy = busquedaMaquinaHoy('spnac012',$newToF,$newTo);

  $spnac006CpuPasada = busquedaMaquina('spnac006',$newFrom);
  $spnac008CpuPasada = busquedaMaquina('spnac008',$newFrom);
  $spnac010CpuPasada = busquedaMaquina('spnac010',$newFrom);
  $spnac012CpuPasada = busquedaMaquina('spnac012',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';

  while($r2 = pg_fetch_assoc($spnac006CpuPasada)) {
        $series2['data'][] = $r2['cpu'];
        $category['data'][] = $r2['fecha'];
      }
  while($r4 = pg_fetch_assoc($spnac008CpuPasada)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r6 = pg_fetch_assoc($spnac010CpuPasada)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($spnac012CpuPasada)) {
        $series7['data'][] = $r7['cpu'];
      }

  while($r9 = pg_fetch_assoc($spnac006CpuHoy)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r11 = pg_fetch_assoc($spnac008CpuHoy)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r13 = pg_fetch_assoc($spnac010CpuHoy)) {
        $series13['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($spnac012CpuHoy)) {
        $series14['data'][] = $r14['cpu'];
      }

  /*Carga del array del Json*/
  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series2);
  array_push($datos,$series4);
  array_push($datos,$series6);
  array_push($datos,$series7);
  array_push($datos,$series9);
  array_push($datos,$series11);
  array_push($datos,$series13);
  array_push($datos,$series14);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
