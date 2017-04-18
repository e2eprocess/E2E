<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryCpu.php");

  $hoy= date("Y-m-d H:m", strtotime('-20 minute'));

  $spnac005CpuPasada = busquedaMaquinaAll('spnac005', $hoy);
  $spnac007CpuPasada = busquedaMaquinaAll('spnac007', $hoy);
  $spnac009CpuPasada = busquedaMaquinaAll('spnac009', $hoy);


  /*Recuperación datos*/

  while($r1 = pg_fetch_assoc($spnac005CpuPasada)) {
        $fecha = $r1['x']*1000;
        $series1[] = [$fecha,$r1['y']];
      }
  while($r3 = pg_fetch_assoc($spnac007CpuPasada)) {
        $fecha = $r3['x']*1000;
        $series3[] = [$fecha,$r3['y']];
      }
  while($r5 = pg_fetch_assoc($spnac009CpuPasada)) {
        $fecha = $r5['x']*1000;
        $series5[] = [$fecha,$r5['y']];
      }


  /*Carga del array del Json*/
  $datos = array();
  array_push($datos,$series1);
  array_push($datos,$series3);
  array_push($datos,$series5);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
