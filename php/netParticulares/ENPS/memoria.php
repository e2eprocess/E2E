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
  $ENPS_701_20_To = busqueda('apbad002','ENPS_701_20',$newTo);
  $ENPS_701_21_To = busqueda('apbad002','ENPS_701_21',$newTo);
  $ENPS_701_22_To = busqueda('apbad002','ENPS_701_22',$newTo);
  $ENPS_701_30_To = busqueda('apbad003','ENPS_701_30',$newTo);
  $ENPS_701_31_To = busqueda('apbad003','ENPS_701_31',$newTo);
  $ENPS_701_32_To = busqueda('apbad003','ENPS_701_32',$newTo);
  $ENPS_701_40_To = busqueda('apbad004','ENPS_701_40',$newTo);
  $ENPS_701_41_To = busqueda('apbad004','ENPS_701_41',$newTo);
  $ENPS_701_42_To = busqueda('apbad004','ENPS_701_42',$newTo);
  $ENPS_701_60_To = busqueda('apbad006','ENPS_701_60',$newTo);
  $ENPS_701_61_To = busqueda('apbad006','ENPS_701_61',$newTo);
  $ENPS_701_62_To = busqueda('apbad006','ENPS_701_62',$newTo);

  $ENPS_701_20_From = busqueda('apbad002','ENPS_701_20',$newFrom);
  $ENPS_701_21_From = busqueda('apbad002','ENPS_701_21',$newFrom);
  $ENPS_701_22_From = busqueda('apbad002','ENPS_701_22',$newFrom);
  $ENPS_701_30_From = busqueda('apbad003','ENPS_701_30',$newFrom);
  $ENPS_701_31_From = busqueda('apbad003','ENPS_701_31',$newFrom);
  $ENPS_701_32_From = busqueda('apbad003','ENPS_701_32',$newFrom);
  $ENPS_701_40_From = busqueda('apbad004','ENPS_701_40',$newFrom);
  $ENPS_701_41_From = busqueda('apbad004','ENPS_701_41',$newFrom);
  $ENPS_701_42_From = busqueda('apbad004','ENPS_701_42',$newFrom);
  $ENPS_701_60_From = busqueda('apbad006','ENPS_701_60',$newFrom);
  $ENPS_701_61_From = busqueda('apbad006','ENPS_701_61',$newFrom);
  $ENPS_701_62_From = busqueda('apbad006','ENPS_701_62',$newFrom);

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

  mysql_close($conexion);

?>
