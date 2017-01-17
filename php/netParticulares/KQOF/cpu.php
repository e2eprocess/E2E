<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryCpu.php");

  /*Declaracion de arrays json*/
  $category = array();
  $titulo = array();
  $series1 = array();
  $series2 = array();
  $series3 = array();
  $series4 = array();
  $series5 = array();
  $series6 = array();
  $series7 = array();
  $series8 = array();
  $series9 = array();
  $series10 = array();
  $series11 = array();
  $series12 = array();
  $series13 = array();
  $series14 = array();
  $series15 = array();
  $series16 = array();
  $series17 = array();
  $series18 = array();
  $series19 = array();
  $series20 = array();
  $series21 = array();
  $series22 = array();
  $series23 = array();
  $series24 = array();


  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  if(date("Y-m-d")==$newTo){
    $newToF = date("Y-m-d 00:00");
    $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
    $KQOF_S01_20_To = busquedaClonHoy('KQOF_S01_20',$newToF,$newTo);
    $KQOF_S01_21_To = busquedaClonHoy('KQOF_S01_21',$newToF,$newTo);
    $KQOF_S01_22_To = busquedaClonHoy('KQOF_S01_22',$newToF,$newTo);
    $KQOF_S01_30_To = busquedaClonHoy('KQOF_S01_30',$newToF,$newTo);
    $KQOF_S01_31_To = busquedaClonHoy('KQOF_S01_31',$newToF,$newTo);
    $KQOF_S01_32_To = busquedaClonHoy('KQOF_S01_32',$newToF,$newTo);
    $KQOF_S01_40_To = busquedaClonHoy('KQOF_S01_40',$newToF,$newTo);
    $KQOF_S01_41_To = busquedaClonHoy('KQOF_S01_41',$newToF,$newTo);
    $KQOF_S01_42_To = busquedaClonHoy('KQOF_S01_42',$newToF,$newTo);
    $KQOF_S01_60_To = busquedaClonHoy('KQOF_S01_60',$newToF,$newTo);
    $KQOF_S01_61_To = busquedaClonHoy('KQOF_S01_61',$newToF,$newTo);
    $KQOF_S01_62_To = busquedaClonHoy('KQOF_S01_62',$newToF,$newTo);
  }else{
    $KQOF_S01_20_To = busquedaClon('KQOF_S01_20',$newTo);
    $KQOF_S01_21_To = busquedaClon('KQOF_S01_21',$newTo);
    $KQOF_S01_22_To = busquedaClon('KQOF_S01_22',$newTo);
    $KQOF_S01_30_To = busquedaClon('KQOF_S01_30',$newTo);
    $KQOF_S01_31_To = busquedaClon('KQOF_S01_31',$newTo);
    $KQOF_S01_32_To = busquedaClon('KQOF_S01_32',$newTo);
    $KQOF_S01_40_To = busquedaClon('KQOF_S01_40',$newTo);
    $KQOF_S01_41_To = busquedaClon('KQOF_S01_41',$newTo);
    $KQOF_S01_42_To = busquedaClon('KQOF_S01_42',$newTo);
    $KQOF_S01_60_To = busquedaClon('KQOF_S01_60',$newTo);
    $KQOF_S01_61_To = busquedaClon('KQOF_S01_61',$newTo);
    $KQOF_S01_62_To = busquedaClon('KQOF_S01_62',$newTo);
  }
  $KQOF_S01_20_From = busquedaClon('KQOF_S01_20',$newFrom);
  $KQOF_S01_21_From = busquedaClon('KQOF_S01_21',$newFrom);
  $KQOF_S01_22_From = busquedaClon('KQOF_S01_22',$newFrom);
  $KQOF_S01_30_From = busquedaClon('KQOF_S01_30',$newFrom);
  $KQOF_S01_31_From = busquedaClon('KQOF_S01_31',$newFrom);
  $KQOF_S01_32_From = busquedaClon('KQOF_S01_32',$newFrom);
  $KQOF_S01_40_From = busquedaClon('KQOF_S01_40',$newFrom);
  $KQOF_S01_41_From = busquedaClon('KQOF_S01_41',$newFrom);
  $KQOF_S01_42_From = busquedaClon('KQOF_S01_42',$newFrom);
  $KQOF_S01_60_From = busquedaClon('KQOF_S01_60',$newFrom);
  $KQOF_S01_61_From = busquedaClon('KQOF_S01_61',$newFrom);
  $KQOF_S01_62_From = busquedaClon('KQOF_S01_62',$newFrom);


  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($KQOF_S01_20_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($KQOF_S01_21_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($KQOF_S01_22_From)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($KQOF_S01_30_From)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($KQOF_S01_31_From)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($KQOF_S01_32_From)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($KQOF_S01_40_From)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($KQOF_S01_41_From)) {
        $series8['data'][] = $r8['cpu'];
      }
  while($r9 = pg_fetch_assoc($KQOF_S01_42_From)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($KQOF_S01_60_From)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($KQOF_S01_61_From)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($KQOF_S01_62_From)) {
        $series12['data'][] = $r12['cpu'];
      }

  while($r13 = pg_fetch_assoc($KQOF_S01_20_To)) {
        $series13['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($KQOF_S01_21_To)) {
        $series14['data'][] = $r14['cpu'];
      }
  while($r15 = pg_fetch_assoc($KQOF_S01_22_To)) {
        $series15['data'][] = $r15['cpu'];
      }
  while($r16 = pg_fetch_assoc($KQOF_S01_30_To)) {
        $series16['data'][] = $r16['cpu'];
      }
  while($r17 = pg_fetch_assoc($KQOF_S01_31_To)) {
        $series17['data'][] = $r17['cpu'];
      }
  while($r18 = pg_fetch_assoc($KQOF_S01_32_To)) {
        $series18['data'][] = $r18['cpu'];
      }
  while($r19 = pg_fetch_assoc($KQOF_S01_40_To)) {
        $series19['data'][] = $r19['cpu'];
      }
  while($r20 = pg_fetch_assoc($KQOF_S01_41_To)) {
        $series20['data'][] = $r20['cpu'];
      }
  while($r21 = pg_fetch_assoc($KQOF_S01_42_To)) {
        $series21['data'][] = $r21['cpu'];
      }
  while($r22 = pg_fetch_assoc($KQOF_S01_60_To)) {
        $series22['data'][] = $r22['cpu'];
      }
  while($r23 = pg_fetch_assoc($KQOF_S01_61_To)) {
        $series23['data'][] = $r23['cpu'];
      }
  while($r24 = pg_fetch_assoc($KQOF_S01_62_To)) {
        $series24['data'][] = $r24['cpu'];
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
