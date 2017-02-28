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

  $spnac005CpuHoy = busquedaMaquinaHoy('spnac005',$newToF,$newTo);
  $spnac007CpuHoy = busquedaMaquinaHoy('spnac007',$newToF,$newTo);
  $spnac009CpuHoy = busquedaMaquinaHoy('spnac009',$newToF,$newTo);

  $spnac005CpuPasada = busquedaMaquina('spnac005',$newFrom);
  $spnac007CpuPasada = busquedaMaquina('spnac007',$newFrom);
  $spnac009CpuPasada = busquedaMaquina('spnac009',$newFrom);

  /*Recuperación datos*/
  $category['name'] = 'fecha';

  while($r1 = pg_fetch_assoc($spnac005CpuPasada)) {
        $series1['data'][] = $r1['cpu'];
        $category['data'][] = $r1['fecha'];
      }
  while($r3 = pg_fetch_assoc($spnac007CpuPasada)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r5 = pg_fetch_assoc($spnac009CpuPasada)) {
        $series5['data'][] = $r5['cpu'];
      }

  while($r8 = pg_fetch_assoc($spnac005CpuHoy)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r10 = pg_fetch_assoc($spnac007CpuHoy)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r12 = pg_fetch_assoc($spnac009CpuHoy)) {
        $series12['data'][] = $r12['cpu'];
      }

  /*Carga del array del Json*/
  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series3);
  array_push($datos,$series5);
  array_push($datos,$series8);
  array_push($datos,$series10);
  array_push($datos,$series12);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
