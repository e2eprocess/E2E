<?php
require_once("../conexion_e2e_process.php");
require_once("../queryCpu.php");

/*Recuperar variables de sesión que contienen las fechas a comparar*/
session_start();
$from = $_SESSION["fechaFromNet"];
$newFrom = date("Y-m-d", strtotime($from));
$to=$_SESSION["fechaToNet"];
$newTo = date("Y-m-d", strtotime($to));

/*Declaración variables*/
if(date("Y-m-d")==$newTo){
  $newToF = date("Y-m-d 00:00");
  $newTo = date("Y-m-d H:i", strtotime('-10 minute'));
  $lppxo301CpuHoy = busquedaMaquinaHoy('lppxo301',$newToF,$newTo);
  $lppxo302CpuHoy = busquedaMaquinaHoy('lppxo302',$newToF,$newTo);
  $lppxo303CpuHoy = busquedaMaquinaHoy('lppxo303',$newToF,$newTo);
  $lppxo304CpuHoy = busquedaMaquinaHoy('lppxo304',$newToF,$newTo);
  $lppxo305CpuHoy = busquedaMaquinaHoy('lppxo305',$newToF,$newTo);
  $lppxo306CpuHoy = busquedaMaquinaHoy('lppxo306',$newToF,$newTo);
  $lppxo307CpuHoy = busquedaMaquinaHoy('lppxo307',$newToF,$newTo);
  $lppxo308CpuHoy = busquedaMaquinaHoy('lppxo308',$newToF,$newTo);
  $lppxo309CpuHoy = busquedaMaquinaHoy('lppxo309',$newToF,$newTo);
  $lppxo310CpuHoy = busquedaMaquinaHoy('lppxo310',$newToF,$newTo);
  $lppxo311CpuHoy = busquedaMaquinaHoy('lppxo311',$newToF,$newTo);
  $lppxo312CpuHoy = busquedaMaquinaHoy('lppxo312',$newToF,$newTo);
}else{
  $lppxo301CpuHoy = busquedaMaquina('lppxo301',$newTo);
  $lppxo302CpuHoy = busquedaMaquina('lppxo302',$newTo);
  $lppxo303CpuHoy = busquedaMaquina('lppxo303',$newTo);
  $lppxo304CpuHoy = busquedaMaquina('lppxo304',$newTo);
  $lppxo305CpuHoy = busquedaMaquina('lppxo305',$newTo);
  $lppxo306CpuHoy = busquedaMaquina('lppxo306',$newTo);
  $lppxo307CpuHoy = busquedaMaquina('lppxo307',$newTo);
  $lppxo308CpuHoy = busquedaMaquina('lppxo308',$newTo);
  $lppxo309CpuHoy = busquedaMaquina('lppxo309',$newTo);
  $lppxo310CpuHoy = busquedaMaquina('lppxo310',$newTo);
  $lppxo311CpuHoy = busquedaMaquina('lppxo311',$newTo);
  $lppxo312CpuHoy = busquedaMaquina('lppxo312',$newTo);
}
$lppxo301CpuPasada = busquedaMaquina('lppxo301',$newFrom);
$lppxo302CpuPasada = busquedaMaquina('lppxo302',$newFrom);
$lppxo303CpuPasada = busquedaMaquina('lppxo303',$newFrom);
$lppxo304CpuPasada = busquedaMaquina('lppxo304',$newFrom);
$lppxo305CpuPasada = busquedaMaquina('lppxo305',$newFrom);
$lppxo306CpuPasada = busquedaMaquina('lppxo306',$newFrom);
$lppxo307CpuPasada = busquedaMaquina('lppxo307',$newFrom);
$lppxo308CpuPasada = busquedaMaquina('lppxo308',$newFrom);
$lppxo309CpuPasada = busquedaMaquina('lppxo309',$newFrom);
$lppxo310CpuPasada = busquedaMaquina('lppxo310',$newFrom);
$lppxo311CpuPasada = busquedaMaquina('lppxo311',$newFrom);
$lppxo312CpuPasada = busquedaMaquina('lppxo312',$newFrom);

/*Recuperación datos*/
$category['name'] = 'fecha';
$titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

while($r1 = pg_fetch_assoc($lppxo301CpuPasada)) {
      $category['data'][] = $r1['fecha'];
      $series1['data'][] = $r1['cpu'];
    }
while($r2 = pg_fetch_assoc($lppxo302CpuPasada)) {
      $series2['data'][] = $r2['cpu'];
    }
while($r3 = pg_fetch_assoc($lppxo303CpuPasada)) {
      $series3['data'][] = $r3['cpu'];
    }
while($r4 = pg_fetch_assoc($lppxo304CpuPasada)) {
      $series4['data'][] = $r4['cpu'];
    }
while($r5 = pg_fetch_assoc($lppxo305CpuPasada)) {
      $series5['data'][] = $r5['cpu'];
    }
while($r6 = pg_fetch_assoc($lppxo306CpuPasada)) {
      $series6['data'][] = $r6['cpu'];
    }
while($r7 = pg_fetch_assoc($lppxo307CpuPasada)) {
      $series7['data'][] = $r7['cpu'];
    }
while($r8 = pg_fetch_assoc($lppxo308CpuPasada)) {
      $series8['data'][] = $r8['cpu'];
    }
while($r9 = pg_fetch_assoc($lppxo309CpuPasada)) {
      $series9['data'][] = $r9['cpu'];
    }
while($r10 = pg_fetch_assoc($lppxo310CpuPasada)) {
      $series10['data'][] = $r10['cpu'];
    }
while($r11 = pg_fetch_assoc($lppxo311CpuPasada)) {
      $series11['data'][] = $r11['cpu'];
    }
while($r12 = pg_fetch_assoc($lppxo312CpuPasada)) {
      $series12['data'][] = $r12['cpu'];
    }

while($r13 = pg_fetch_assoc($lppxo301CpuHoy)) {
      $series13['data'][] = $r13['cpu'];
    }
while($r14 = pg_fetch_assoc($lppxo302CpuHoy)) {
      $series14['data'][] = $r14['cpu'];
    }
while($r15 = pg_fetch_assoc($lppxo303CpuHoy)) {
      $series15['data'][] = $r15['cpu'];
    }
while($r16 = pg_fetch_assoc($lppxo304CpuHoy)) {
      $series16['data'][] = $r16['cpu'];
    }
while($r17 = pg_fetch_assoc($lppxo305CpuHoy)) {
      $series17['data'][] = $r17['cpu'];
    }
while($r18 = pg_fetch_assoc($lppxo306CpuHoy)) {
      $series18['data'][] = $r18['cpu'];
    }
while($r19 = pg_fetch_assoc($lppxo307CpuHoy)) {
      $series19['data'][] = $r19['cpu'];
    }
while($r20 = pg_fetch_assoc($lppxo308CpuHoy)) {
      $series20['data'][] = $r20['cpu'];
    }
while($r21 = pg_fetch_assoc($lppxo309CpuHoy)) {
      $series21['data'][] = $r21['cpu'];
    }
while($r22 = pg_fetch_assoc($lppxo310CpuHoy)) {
      $series22['data'][] = $r22['cpu'];
    }
while($r23 = pg_fetch_assoc($lppxo311CpuHoy)) {
      $series23['data'][] = $r23['cpu'];
    }
while($r24 = pg_fetch_assoc($lppxo312CpuHoy)) {
      $series24['data'][] = $r24['cpu'];
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
array_push($datos,$series19);
array_push($datos,$series20);
array_push($datos,$series21);
array_push($datos,$series22);
array_push($datos,$series23);
array_push($datos,$series24);
array_push($datos,$titulo);

print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
