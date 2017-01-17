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
    $KYGU_S01_10_To = busquedaClonHoy('KYGU_S01_10',$newToF,$newTo);
    $KYGU_S01_11_To = busquedaClonHoy('KYGU_S01_11',$newToF,$newTo);
    $KYGU_S01_20_To = busquedaClonHoy('KYGU_S01_20',$newToF,$newTo);
    $KYGU_S01_21_To = busquedaClonHoy('KYGU_S01_21',$newToF,$newTo);
    $KYGU_S01_30_To = busquedaClonHoy('KYGU_S01_30',$newToF,$newTo);
    $KYGU_S01_31_To = busquedaClonHoy('KYGU_S01_31',$newToF,$newTo);
    $KYGU_S01_40_To = busquedaClonHoy('KYGU_S01_40',$newToF,$newTo);
    $KYGU_S01_41_To = busquedaClonHoy('KYGU_S01_41',$newToF,$newTo);
  }else{
    $KYGU_S01_10_To = busquedaClon('KYGU_S01_10',$newTo);
    $KYGU_S01_11_To = busquedaClon('KYGU_S01_11',$newTo);
    $KYGU_S01_20_To = busquedaClon('KYGU_S01_20',$newTo);
    $KYGU_S01_21_To = busquedaClon('KYGU_S01_21',$newTo);
    $KYGU_S01_30_To = busquedaClon('KYGU_S01_30',$newTo);
    $KYGU_S01_31_To = busquedaClon('KYGU_S01_31',$newTo);
    $KYGU_S01_40_To = busquedaClon('KYGU_S01_40',$newTo);
    $KYGU_S01_41_To = busquedaClon('KYGU_S01_41',$newTo);
  }
  $KYGU_S01_10_From = busquedaClon('KYGU_S01_10',$newFrom);
  $KYGU_S01_11_From = busquedaClon('KYGU_S01_11',$newFrom);
  $KYGU_S01_20_From = busquedaClon('KYGU_S01_20',$newFrom);
  $KYGU_S01_21_From = busquedaClon('KYGU_S01_21',$newFrom);
  $KYGU_S01_30_From = busquedaClon('KYGU_S01_30',$newFrom);
  $KYGU_S01_31_From = busquedaClon('KYGU_S01_31',$newFrom);
  $KYGU_S01_40_From = busquedaClon('KYGU_S01_40',$newFrom);
  $KYGU_S01_41_From = busquedaClon('KYGU_S01_41',$newFrom);


  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($KYGU_S01_10_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($KYGU_S01_11_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($KYGU_S01_20_From)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($KYGU_S01_21_From)) {
        $series4['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($KYGU_S01_30_From)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($KYGU_S01_31_From)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($KYGU_S01_40_From)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($KYGU_S01_41_From)) {
        $series8['data'][] = $r8['cpu'];
      }

  while($r9 = pg_fetch_assoc($KYGU_S01_10_To)) {
        $series9['data'][] = $r9['cpu'];
      }
  while($r10 = pg_fetch_assoc($KYGU_S01_11_To)) {
        $series10['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($KYGU_S01_20_To)) {
        $series11['data'][] = $r11['cpu'];
      }
  while($r12 = pg_fetch_assoc($KYGU_S01_21_To)) {
        $series12['data'][] = $r12['cpu'];
      }
  while($r13 = pg_fetch_assoc($KYGU_S01_30_To)) {
        $series13['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($KYGU_S01_31_To)) {
        $series14['data'][] = $r14['cpu'];
      }
  while($r15 = pg_fetch_assoc($KYGU_S01_40_To)) {
        $series15['data'][] = $r15['cpu'];
      }
  while($r16 = pg_fetch_assoc($KYGU_S01_41_To)) {
        $series16['data'][] = $r16['cpu'];
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
