<?php
require_once("../../conexion_e2e_process.php");
require_once("../../querys/informeMensual/informeMensual.php");

$maxPeticiones = max_peti('ASOnet');
$r8 = pg_fetch_assoc($maxPeticiones);
$newFrom = $r8['fecha_max'];

$newToF = date("Y-m-d 00:00");
$newTo = date("Y-m-d H:i", strtotime('-10 minute'));
$to = date("Y-m-d");

$titulo['text'] = "<b>$newFrom</b> comparado con <b>$to</b>";

$lpsrn302CpuHoy = busquedaMaquinaHoy('lpsrn302',$newToF,$newTo);
$lpsrv301CpuHoy = busquedaMaquinaHoy('lpsrv301',$newToF,$newTo);
$lpsrv302CpuHoy = busquedaMaquinaHoy('lpsrv302',$newToF,$newTo);
$lpsrv303CpuHoy = busquedaMaquinaHoy('lpsrv303',$newToF,$newTo);
$lpsrn301CpuHoy = busquedaMaquinaHoy('lpsrn301',$newToF,$newTo);
$lpsrv304CpuHoy = busquedaMaquinaHoy('lpsrv304',$newToF,$newTo);
$lpsrv319CpuHoy = busquedaMaquinaHoy('lpsrv319',$newToF,$newTo);
$lpsrv320CpuHoy = busquedaMaquinaHoy('lpsrv320',$newToF,$newTo);
$lpsrv321CpuHoy = busquedaMaquinaHoy('lpsrv321',$newToF,$newTo);

$lpsrn302CpuPasada = busquedaMaquina('lpsrn302',$newFrom);
$lpsrv301CpuPasada = busquedaMaquina('lpsrv301',$newFrom);
$lpsrv302CpuPasada = busquedaMaquina('lpsrv302',$newFrom);
$lpsrv303CpuPasada = busquedaMaquina('lpsrv303',$newFrom);
$lpsrn301CpuPasada = busquedaMaquina('lpsrn301',$newFrom);
$lpsrv304CpuPasada = busquedaMaquina('lpsrv304',$newFrom);
$lpsrv319CpuPasada = busquedaMaquina('lpsrv319',$newFrom);
$lpsrv320CpuPasada = busquedaMaquina('lpsrv320',$newFrom);
$lpsrv321CpuPasada = busquedaMaquina('lpsrv321',$newFrom);

/*Recuperación datos*/
$category['name'] = 'fecha';

while($r1 = pg_fetch_assoc($lpsrn301CpuPasada)) {
      $category['data'][] = $r1['fecha'];
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = pg_fetch_assoc($lpsrn302CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = pg_fetch_assoc($lpsrv301CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = pg_fetch_assoc($lpsrv302CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = pg_fetch_assoc($lpsrv303CpuPasada)) {
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = pg_fetch_assoc($lpsrv304CpuPasada)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = pg_fetch_assoc($lpsrv319CpuPasada)) {
      $series7['data'][] = $r7['cpu'];
    }
while($r8 = pg_fetch_assoc($lpsrv320CpuPasada)) {
      $series8['data'][] = $r8['cpu'];
    }
while($r9 = pg_fetch_assoc($lpsrv321CpuPasada)) {
      $series9['data'][] = $r9['cpu'];
    }

while($r10 = pg_fetch_assoc($lpsrn301CpuHoy)) {
      $series10['data'][] = $r10['cpu'];
    }
while($r11 = pg_fetch_assoc($lpsrn302CpuHoy)) {
      $series11['data'][] = $r11['cpu'];
    }
while($r12 = pg_fetch_assoc($lpsrv301CpuHoy)) {
      $series12['data'][] = $r12['cpu'];
    }
while($r13 = pg_fetch_assoc($lpsrv302CpuHoy)) {
      $series13['data'][] = $r13['cpu'];
    }
while($r14 = pg_fetch_assoc($lpsrv303CpuHoy)) {
      $series14['data'][] = $r14['cpu'];
    }
while($r15 = pg_fetch_assoc($lpsrv304CpuHoy)) {
      $series15['data'][] = $r15['cpu'];
    }
while($r16 = pg_fetch_assoc($lpsrv319CpuHoy)) {
      $series16['data'][] = $r16['cpu'];
    }
while($r17 = pg_fetch_assoc($lpsrv320CpuHoy)) {
      $series17['data'][] = $r17['cpu'];
    }
while($r18 = pg_fetch_assoc($lpsrv321CpuHoy)) {
      $series18['data'][] = $r18['cpu'];
    }

$datos = array();
array_push($datos,$category);
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$series4);
array_push($datos,$series5);
array_push($datos,$series6);
array_push($datos,$series7);
array_push($datos,$series8);
array_push($datos,$series9);
array_push($datos,$series10);
array_push($datos,$series11);
array_push($datos,$series12);
array_push($datos,$series13);
array_push($datos,$series14);
array_push($datos,$series15);
array_push($datos,$series16);
array_push($datos,$series17);
array_push($datos,$series18);
array_push($datos,$titulo);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
