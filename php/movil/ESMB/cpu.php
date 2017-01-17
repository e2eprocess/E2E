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
    $ESMB_S02_25_To = busquedaClonHoy('ESMB_S02_25',$newToF,$newTo);
    $ESMB_S02_26_To = busquedaClonHoy('ESMB_S02_26',$newToF,$newTo);
    $ESMB_S02_35_To = busquedaClonHoy('ESMB_S02_35',$newToF,$newTo);
    $ESMB_S02_36_To = busquedaClonHoy('ESMB_S02_36',$newToF,$newTo);
    $ESMB_S02_45_To = busquedaClonHoy('ESMB_S02_45',$newToF,$newTo);
    $ESMB_S02_46_To = busquedaClonHoy('ESMB_S02_46',$newToF,$newTo);
    $ESMB_S02_65_To = busquedaClonHoy('ESMB_S02_65',$newToF,$newTo);
    $ESMB_S02_66_To = busquedaClonHoy('ESMB_S02_66',$newToF,$newTo);
  }else {
    $ESMB_S02_25_To = busquedaClon('ESMB_S02_25',$newTo);
    $ESMB_S02_26_To = busquedaClon('ESMB_S02_26',$newTo);
    $ESMB_S02_35_To = busquedaClon('ESMB_S02_35',$newTo);
    $ESMB_S02_36_To = busquedaClon('ESMB_S02_36',$newTo);
    $ESMB_S02_45_To = busquedaClon('ESMB_S02_45',$newTo);
    $ESMB_S02_46_To = busquedaClon('ESMB_S02_46',$newTo);
    $ESMB_S02_65_To = busquedaClon('ESMB_S02_65',$newTo);
    $ESMB_S02_66_To = busquedaClon('ESMB_S02_66',$newTo);
  }
  $ESMB_S02_25_From = busquedaClon('ESMB_S02_25',$newFrom);
  $ESMB_S02_26_From = busquedaClon('ESMB_S02_26',$newFrom);
  $ESMB_S02_35_From = busquedaClon('ESMB_S02_35',$newFrom);
  $ESMB_S02_36_From = busquedaClon('ESMB_S02_36',$newFrom);
  $ESMB_S02_45_From = busquedaClon('ESMB_S02_45',$newFrom);
  $ESMB_S02_46_From = busquedaClon('ESMB_S02_46',$newFrom);
  $ESMB_S02_65_From = busquedaClon('ESMB_S02_65',$newFrom);
  $ESMB_S02_66_From = busquedaClon('ESMB_S02_66',$newFrom);


  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($ESMB_S02_25_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($ESMB_S02_26_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r4 = pg_fetch_assoc($ESMB_S02_35_From)) {
        $series3['data'][] = $r4['cpu'];
      }
  while($r5 = pg_fetch_assoc($ESMB_S02_36_From)) {
        $series4['data'][] = $r5['cpu'];
      }
  while($r7 = pg_fetch_assoc($ESMB_S02_45_From)) {
        $series5['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($ESMB_S02_46_From)) {
        $series6['data'][] = $r8['cpu'];
      }
  while($r10 = pg_fetch_assoc($ESMB_S02_65_From)) {
        $series7['data'][] = $r10['cpu'];
      }
  while($r11 = pg_fetch_assoc($ESMB_S02_66_From)) {
        $series8['data'][] = $r11['cpu'];
      }

  while($r13 = pg_fetch_assoc($ESMB_S02_25_To)) {
        $series9['data'][] = $r13['cpu'];
      }
  while($r14 = pg_fetch_assoc($ESMB_S02_26_To)) {
        $series10['data'][] = $r14['cpu'];
      }
  while($r16 = pg_fetch_assoc($ESMB_S02_35_To)) {
        $series11['data'][] = $r16['cpu'];
      }
  while($r17 = pg_fetch_assoc($ESMB_S02_36_To)) {
        $series12['data'][] = $r17['cpu'];
      }
  while($r19 = pg_fetch_assoc($ESMB_S02_45_To)) {
        $series13['data'][] = $r19['cpu'];
      }
  while($r20 = pg_fetch_assoc($ESMB_S02_46_To)) {
        $series14['data'][] = $r20['cpu'];
      }
  while($r22 = pg_fetch_assoc($ESMB_S02_65_To)) {
        $series15['data'][] = $r22['cpu'];
      }
  while($r23 = pg_fetch_assoc($ESMB_S02_66_To)) {
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
