<?php
  require_once("../../conexion_e2e_process.php");

  /* Query fecha menos 24 horas
  function busqueda($MAQUINA,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                      memoria
                              FROM    seguimiento_cx_maquina
                              WHERE   maquina = '".$MAQUINA."'
                              AND     canal = 'net'
                              AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 24 HOUR)
                              AND     fecha <= '".$FECHA_QUERY."'");
    return $resultado;
  }*/

  /*query*/
  function busqueda($MAQUINA,$INSTANCIAS,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%k:%i')as fecha,
                                      memoria
                              FROM    informe_instancias
                              WHERE   maquina = '".$MAQUINA."'
                              AND     instancias = '".$INSTANCIAS."'
                              AND     fecha like '".$FECHA_QUERY."%'");
    return $resultado;
  }

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
  $KYFB_S01_10_To = busqueda('apbad022','KYFB_S01_10',$newTo);
  $KYFB_S01_11_To = busqueda('apbad022','KYFB_S01_11',$newTo);
  $KYFB_S01_12_To = busqueda('apbad022','KYFB_S01_12',$newTo);
  $KYFB_S01_20_To = busqueda('apbad023','KYFB_S01_20',$newTo);
  $KYFB_S01_21_To = busqueda('apbad023','KYFB_S01_21',$newTo);
  $KYFB_S01_22_To = busqueda('apbad023','KYFB_S01_22',$newTo);
  $KYFB_S01_30_To = busqueda('apbad024','KYFB_S01_30',$newTo);
  $KYFB_S01_31_To = busqueda('apbad024','KYFB_S01_31',$newTo);
  $KYFB_S01_32_To = busqueda('apbad024','KYFB_S01_32',$newTo);
  $KYFB_S01_40_To = busqueda('apbad026','KYFB_S01_40',$newTo);
  $KYFB_S01_41_To = busqueda('apbad026','KYFB_S01_41',$newTo);
  $KYFB_S01_42_To = busqueda('apbad026','KYFB_S01_42',$newTo);

  $KYFB_S01_10_From = busqueda('apbad022','KYFB_S01_10',$newFrom);
  $KYFB_S01_11_From = busqueda('apbad022','KYFB_S01_11',$newFrom);
  $KYFB_S01_12_From = busqueda('apbad022','KYFB_S01_12',$newFrom);
  $KYFB_S01_20_From = busqueda('apbad023','KYFB_S01_20',$newFrom);
  $KYFB_S01_21_From = busqueda('apbad023','KYFB_S01_21',$newFrom);
  $KYFB_S01_22_From = busqueda('apbad023','KYFB_S01_22',$newFrom);
  $KYFB_S01_30_From = busqueda('apbad024','KYFB_S01_30',$newFrom);
  $KYFB_S01_31_From = busqueda('apbad024','KYFB_S01_31',$newFrom);
  $KYFB_S01_32_From = busqueda('apbad024','KYFB_S01_32',$newFrom);
  $KYFB_S01_40_From = busqueda('apbad026','KYFB_S01_40',$newFrom);
  $KYFB_S01_41_From = busqueda('apbad026','KYFB_S01_41',$newFrom);
  $KYFB_S01_42_From = busqueda('apbad026','KYFB_S01_42',$newFrom);

  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($KYFB_S01_10_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['memoria'];
      }
  while($r2 = pg_fetch_assoc($KYFB_S01_11_From)) {
        $series2['data'][] = $r2['memoria'];
      }
  while($r3 = pg_fetch_assoc($KYFB_S01_12_From)) {
        $series3['data'][] = $r3['memoria'];
      }
  while($r4 = pg_fetch_assoc($KYFB_S01_20_From)) {
        $series4['data'][] = $r4['memoria'];
      }
  while($r5 = pg_fetch_assoc($KYFB_S01_21_From)) {
        $series5['data'][] = $r5['memoria'];
      }
  while($r6 = pg_fetch_assoc($KYFB_S01_22_From)) {
        $series6['data'][] = $r6['memoria'];
      }
  while($r7 = pg_fetch_assoc($KYFB_S01_30_From)) {
        $series7['data'][] = $r7['memoria'];
      }
  while($r8 = pg_fetch_assoc($KYFB_S01_31_From)) {
        $series8['data'][] = $r8['memoria'];
      }
  while($r9 = pg_fetch_assoc($KYFB_S01_32_From)) {
        $series9['data'][] = $r9['memoria'];
      }
  while($r10 = pg_fetch_assoc($KYFB_S01_40_From)) {
        $series10['data'][] = $r10['memoria'];
      }
  while($r11 = pg_fetch_assoc($KYFB_S01_41_From)) {
        $series11['data'][] = $r11['memoria'];
      }
  while($r12 = pg_fetch_assoc($KYFB_S01_42_From)) {
        $series12['data'][] = $r12['memoria'];
      }

  while($r13 = pg_fetch_assoc($KYFB_S01_10_To)) {
        $series13['data'][] = $r13['memoria'];
      }
  while($r14 = pg_fetch_assoc($KYFB_S01_11_To)) {
        $series14['data'][] = $r14['memoria'];
      }
  while($r15 = pg_fetch_assoc($KYFB_S01_12_To)) {
        $series15['data'][] = $r15['memoria'];
      }
  while($r16 = pg_fetch_assoc($KYFB_S01_20_To)) {
        $series16['data'][] = $r16['memoria'];
      }
  while($r17 = pg_fetch_assoc($KYFB_S01_21_To)) {
        $series17['data'][] = $r17['memoria'];
      }
  while($r18 = pg_fetch_assoc($KYFB_S01_22_To)) {
        $series18['data'][] = $r18['memoria'];
      }
  while($r19 = pg_fetch_assoc($KYFB_S01_30_To)) {
        $series19['data'][] = $r19['memoria'];
      }
  while($r20 = pg_fetch_assoc($KYFB_S01_31_To)) {
        $series20['data'][] = $r20['memoria'];
      }
  while($r21 = pg_fetch_assoc($KYFB_S01_32_To)) {
        $series21['data'][] = $r21['memoria'];
      }
  while($r22 = pg_fetch_assoc($KYFB_S01_40_To)) {
        $series22['data'][] = $r22['memoria'];
      }
  while($r23 = pg_fetch_assoc($KYFB_S01_41_To)) {
        $series23['data'][] = $r23['memoria'];
      }
  while($r24 = pg_fetch_assoc($KYFB_S01_42_To)) {
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
