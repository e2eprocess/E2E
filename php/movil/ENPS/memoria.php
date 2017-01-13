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
  $ENPS_801_23_To = busqueda('apbad002','ENPS_801_23',$newTo);
  $ENPS_801_24_To = busqueda('apbad002','ENPS_801_24',$newTo);
  $ENPS_801_33_To = busqueda('apbad003','ENPS_801_33',$newTo);
  $ENPS_801_34_To = busqueda('apbad003','ENPS_801_34',$newTo);
  $ENPS_801_43_To = busqueda('apbad004','ENPS_801_43',$newTo);
  $ENPS_801_44_To = busqueda('apbad004','ENPS_801_44',$newTo);
  $ENPS_801_63_To = busqueda('apbad006','ENPS_801_63',$newTo);
  $ENPS_801_64_To = busqueda('apbad006','ENPS_801_64',$newTo);

  $ENPS_801_23_From = busqueda('apbad002','ENPS_801_23',$newFrom);
  $ENPS_801_24_From = busqueda('apbad002','ENPS_801_24',$newFrom);
  $ENPS_801_33_From = busqueda('apbad003','ENPS_801_33',$newFrom);
  $ENPS_801_34_From = busqueda('apbad003','ENPS_801_34',$newFrom);
  $ENPS_801_43_From = busqueda('apbad004','ENPS_801_43',$newFrom);
  $ENPS_801_44_From = busqueda('apbad004','ENPS_801_44',$newFrom);
  $ENPS_801_63_From = busqueda('apbad006','ENPS_801_63',$newFrom);
  $ENPS_801_64_From = busqueda('apbad006','ENPS_801_64',$newFrom);


  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($ENPS_801_23_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['memoria'];
      }
  while($r2 = pg_fetch_assoc($ENPS_801_24_From)) {
        $series2['data'][] = $r2['memoria'];
      }
  while($r4 = pg_fetch_assoc($ENPS_801_33_From)) {
        $series3['data'][] = $r4['memoria'];
      }
  while($r5 = pg_fetch_assoc($ENPS_801_34_From)) {
        $series4['data'][] = $r5['memoria'];
      }
  while($r7 = pg_fetch_assoc($ENPS_801_43_From)) {
        $series5['data'][] = $r7['memoria'];
      }
  while($r8 = pg_fetch_assoc($ENPS_801_44_From)) {
        $series6['data'][] = $r8['memoria'];
      }
  while($r10 = pg_fetch_assoc($ENPS_801_63_From)) {
        $series7['data'][] = $r10['memoria'];
      }
  while($r11 = pg_fetch_assoc($ENPS_801_64_From)) {
        $series8['data'][] = $r11['memoria'];
      }

  while($r13 = pg_fetch_assoc($ENPS_801_23_To)) {
        $series9['data'][] = $r13['memoria'];
      }
  while($r14 = pg_fetch_assoc($ENPS_801_24_To)) {
        $series10['data'][] = $r14['memoria'];
      }
  while($r16 = pg_fetch_assoc($ENPS_801_33_To)) {
        $series11['data'][] = $r16['memoria'];
      }
  while($r17 = pg_fetch_assoc($ENPS_801_34_To)) {
        $series12['data'][] = $r17['memoria'];
      }
  while($r19 = pg_fetch_assoc($ENPS_801_43_To)) {
        $series13['data'][] = $r19['memoria'];
      }
  while($r20 = pg_fetch_assoc($ENPS_801_44_To)) {
        $series14['data'][] = $r20['memoria'];
      }
  while($r22 = pg_fetch_assoc($ENPS_801_63_To)) {
        $series15['data'][] = $r22['memoria'];
      }
  while($r23 = pg_fetch_assoc($ENPS_801_64_To)) {
        $series16['data'][] = $r23['memoria'];
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

  mysql_close($conexion);

?>
