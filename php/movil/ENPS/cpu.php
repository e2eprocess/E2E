<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryCpu.php");

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
    $ENPS_801_23_To = busquedaClonHoy('ENPS_801_23',$newToF,$newTo);
    $ENPS_801_24_To = busquedaClonHoy('ENPS_801_24',$newToF,$newTo);
    $ENPS_801_33_To = busquedaClonHoy('ENPS_801_33',$newToF,$newTo);
    $ENPS_801_34_To = busquedaClonHoy('ENPS_801_34',$newToF,$newTo);
    $ENPS_801_43_To = busquedaClonHoy('ENPS_801_43',$newToF,$newTo);
    $ENPS_801_44_To = busquedaClonHoy('ENPS_801_44',$newToF,$newTo);
    $ENPS_801_63_To = busquedaClonHoy('ENPS_801_63',$newToF,$newTo);
    $ENPS_801_64_To = busquedaClonHoy('ENPS_801_64',$newToF,$newTo);
  }else{
    $ENPS_801_23_To = busquedaClon('ENPS_801_23',$newTo);
    $ENPS_801_24_To = busquedaClon('ENPS_801_24',$newTo);
    $ENPS_801_33_To = busquedaClon('ENPS_801_33',$newTo);
    $ENPS_801_34_To = busquedaClon('ENPS_801_34',$newTo);
    $ENPS_801_43_To = busquedaClon('ENPS_801_43',$newTo);
    $ENPS_801_44_To = busquedaClon('ENPS_801_44',$newTo);
    $ENPS_801_63_To = busquedaClon('ENPS_801_63',$newTo);
    $ENPS_801_64_To = busquedaClon('ENPS_801_64',$newTo);
  }
  $ENPS_801_23_From = busquedaClon('ENPS_801_23',$newFrom);
  $ENPS_801_24_From = busquedaClon('ENPS_801_24',$newFrom);
  $ENPS_801_33_From = busquedaClon('ENPS_801_33',$newFrom);
  $ENPS_801_34_From = busquedaClon('ENPS_801_34',$newFrom);
  $ENPS_801_43_From = busquedaClon('ENPS_801_43',$newFrom);
  $ENPS_801_44_From = busquedaClon('ENPS_801_44',$newFrom);
  $ENPS_801_63_From = busquedaClon('ENPS_801_63',$newFrom);
  $ENPS_801_64_From = busquedaClon('ENPS_801_64',$newFrom);


  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($ENPS_801_23_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($ENPS_801_24_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r4 = pg_fetch_assoc($ENPS_801_33_From)) {
        $series3['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($ENPS_801_34_From)) {
        $series4['data'][] = $r5['cpu'];
      }
  while($r7 = pg_fetch_assoc($ENPS_801_43_From)) {
        $series5['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($ENPS_801_44_From)) {
        $series6['data'][] = $r8['cpu'];
      }
  while($r10 = pg_fetch_assoc($ENPS_801_63_From)) {
        $series7['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($ENPS_801_64_From)) {
        $series8['data'][] = $r11['cpu'];
      }

  while($r13 = pg_fetch_assoc($ENPS_801_23_To)) {
        $series9['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($ENPS_801_24_To)) {
        $series10['data'][] = $r14['cpu'];
      }
  while($r16 = pg_fetch_assoc($ENPS_801_33_To)) {
        $series11['data'][] = $r16['cpu'];
      }
  while($r17 = pg_fetch_assoc($ENPS_801_34_To)) {
        $series12['data'][] = $r17['cpu'];
      }
  while($r19 = pg_fetch_assoc($ENPS_801_43_To)) {
        $series13['data'][] = $r19['cpu'];
      }
  while($r20 = pg_fetch_assoc($ENPS_801_44_To)) {
        $series14['data'][] = $r20['cpu'];
      }
  while($r22 = pg_fetch_assoc($ENPS_801_63_To)) {
        $series15['data'][] = $r22['cpu'];
      }
  while($r23 = pg_fetch_assoc($ENPS_801_64_To)) {
        $series16['data'][] = $r23['cpu'];
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
