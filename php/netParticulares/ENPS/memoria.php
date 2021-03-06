<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryMemoria.php");

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
    $ENPS_701_20_To = busquedaClonHoy('ENPS_701_20',$newToF,$newTo);
    $ENPS_701_21_To = busquedaClonHoy('ENPS_701_21',$newToF,$newTo);
    $ENPS_701_22_To = busquedaClonHoy('ENPS_701_22',$newToF,$newTo);
    $ENPS_701_30_To = busquedaClonHoy('ENPS_701_30',$newToF,$newTo);
    $ENPS_701_31_To = busquedaClonHoy('ENPS_701_31',$newToF,$newTo);
    $ENPS_701_32_To = busquedaClonHoy('ENPS_701_32',$newToF,$newTo);
    $ENPS_701_40_To = busquedaClonHoy('ENPS_701_40',$newToF,$newTo);
    $ENPS_701_41_To = busquedaClonHoy('ENPS_701_41',$newToF,$newTo);
    $ENPS_701_42_To = busquedaClonHoy('ENPS_701_42',$newToF,$newTo);
    $ENPS_701_60_To = busquedaClonHoy('ENPS_701_60',$newToF,$newTo);
    $ENPS_701_61_To = busquedaClonHoy('ENPS_701_61',$newToF,$newTo);
    $ENPS_701_62_To = busquedaClonHoy('ENPS_701_62',$newToF,$newTo);
  }else{
    $ENPS_701_20_To = busquedaClon('ENPS_701_20',$newTo);
    $ENPS_701_21_To = busquedaClon('ENPS_701_21',$newTo);
    $ENPS_701_22_To = busquedaClon('ENPS_701_22',$newTo);
    $ENPS_701_30_To = busquedaClon('ENPS_701_30',$newTo);
    $ENPS_701_31_To = busquedaClon('ENPS_701_31',$newTo);
    $ENPS_701_32_To = busquedaClon('ENPS_701_32',$newTo);
    $ENPS_701_40_To = busquedaClon('ENPS_701_40',$newTo);
    $ENPS_701_41_To = busquedaClon('ENPS_701_41',$newTo);
    $ENPS_701_42_To = busquedaClon('ENPS_701_42',$newTo);
    $ENPS_701_60_To = busquedaClon('ENPS_701_60',$newTo);
    $ENPS_701_61_To = busquedaClon('ENPS_701_61',$newTo);
    $ENPS_701_62_To = busquedaClon('ENPS_701_62',$newTo);
  }
  $ENPS_701_20_From = busquedaClon('ENPS_701_20',$newFrom);
  $ENPS_701_21_From = busquedaClon('ENPS_701_21',$newFrom);
  $ENPS_701_22_From = busquedaClon('ENPS_701_22',$newFrom);
  $ENPS_701_30_From = busquedaClon('ENPS_701_30',$newFrom);
  $ENPS_701_31_From = busquedaClon('ENPS_701_31',$newFrom);
  $ENPS_701_32_From = busquedaClon('ENPS_701_32',$newFrom);
  $ENPS_701_40_From = busquedaClon('ENPS_701_40',$newFrom);
  $ENPS_701_41_From = busquedaClon('ENPS_701_41',$newFrom);
  $ENPS_701_42_From = busquedaClon('ENPS_701_42',$newFrom);
  $ENPS_701_60_From = busquedaClon('ENPS_701_60',$newFrom);
  $ENPS_701_61_From = busquedaClon('ENPS_701_61',$newFrom);
  $ENPS_701_62_From = busquedaClon('ENPS_701_62',$newFrom);

  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($ENPS_701_20_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['memoria'];
      }
  while($r2 = pg_fetch_assoc($ENPS_701_21_From)) {
        $series2['data'][] = $r2['memoria'];
      }
  while($r3 = pg_fetch_assoc($ENPS_701_22_From)) {
        $series3['data'][] = $r3['memoria'];
      }
  while($r4 = pg_fetch_assoc($ENPS_701_30_From)) {
        $series4['data'][] = $r4['memoria'];
      }
  while($r5 = pg_fetch_assoc($ENPS_701_31_From)) {
        $series5['data'][] = $r5['memoria'];
      }
  while($r6 = pg_fetch_assoc($ENPS_701_32_From)) {
        $series6['data'][] = $r6['memoria'];
      }
  while($r7 = pg_fetch_assoc($ENPS_701_40_From)) {
        $series7['data'][] = $r7['memoria'];
      }
  while($r8 = pg_fetch_assoc($ENPS_701_41_From)) {
        $series8['data'][] = $r8['memoria'];
      }
  while($r9 = pg_fetch_assoc($ENPS_701_42_From)) {
        $series9['data'][] = $r9['memoria'];
      }
  while($r10 = pg_fetch_assoc($ENPS_701_60_From)) {
        $series10['data'][] = $r10['memoria'];
      }
  while($r11 = pg_fetch_assoc($ENPS_701_61_From)) {
        $series11['data'][] = $r11['memoria'];
      }
  while($r12 = pg_fetch_assoc($ENPS_701_62_From)) {
        $series12['data'][] = $r12['memoria'];
      }

  while($r13 = pg_fetch_assoc($ENPS_701_20_To)) {
        $series13['data'][] = $r13['memoria'];
      }
  while($r14 = pg_fetch_assoc($ENPS_701_21_To)) {
        $series14['data'][] = $r14['memoria'];
      }
  while($r15 = pg_fetch_assoc($ENPS_701_22_To)) {
        $series15['data'][] = $r15['memoria'];
      }
  while($r16 = pg_fetch_assoc($ENPS_701_30_To)) {
        $series16['data'][] = $r16['memoria'];
      }
  while($r17 = pg_fetch_assoc($ENPS_701_31_To)) {
        $series17['data'][] = $r17['memoria'];
      }
  while($r18 = pg_fetch_assoc($ENPS_701_32_To)) {
        $series18['data'][] = $r18['memoria'];
      }
  while($r19 = pg_fetch_assoc($ENPS_701_40_To)) {
        $series19['data'][] = $r19['memoria'];
      }
  while($r20 = pg_fetch_assoc($ENPS_701_41_To)) {
        $series20['data'][] = $r20['memoria'];
      }
  while($r21 = pg_fetch_assoc($ENPS_701_42_To)) {
        $series21['data'][] = $r21['memoria'];
      }
  while($r22 = pg_fetch_assoc($ENPS_701_60_To)) {
        $series22['data'][] = $r22['memoria'];
      }
  while($r23 = pg_fetch_assoc($ENPS_701_61_To)) {
        $series23['data'][] = $r23['memoria'];
      }
  while($r24 = pg_fetch_assoc($ENPS_701_62_To)) {
        $series24['data'][] = $r24['memoria'];
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
