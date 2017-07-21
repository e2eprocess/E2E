<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryCpu.php");

  $hoy= date("Y-m-d H:m", strtotime('-10 minute'));

  $spnac006CpuPasada = busquedaMaquinaAll('spnac006',$hoy);
  $spnac008CpuPasada = busquedaMaquinaAll('spnac008',$hoy);
  $spnac010CpuPasada = busquedaMaquinaAll('spnac010',$hoy);
  $spnac012CpuPasada = busquedaMaquinaAll('spnac012',$hoy);


  while($r2 = pg_fetch_assoc($spnac006CpuPasada)) {
        $fecha = $r2['x']*1000;
        $series2[] = [$fecha,$r2['y']];
      }
  while($r4 = pg_fetch_assoc($spnac008CpuPasada)) {
        $fecha = $r4['x']*1000;
        $series4[] = [$fecha,$r4['y']];
      }
  while($r6 = pg_fetch_assoc($spnac010CpuPasada)) {
        $fecha = $r6['x']*1000;
        $series6[] = [$fecha,$r6['y']];
      }
  while($r7 = pg_fetch_assoc($spnac012CpuPasada)) {
        $fecha = $r7['x']*1000;
        $series7[] = [$fecha,$r7['y']];
      }


  /*Carga del array del Json*/
  $datos = array();
  array_push($datos,$series2);
  array_push($datos,$series4);
  array_push($datos,$series6);
  array_push($datos,$series7);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
