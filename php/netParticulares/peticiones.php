<?php
  include("../conexion_e2e_process.php");

  /*query*/
  function busqueda($CANAL,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%k:%i')as fecha,
                                      peticiones,
                                      max_peticiones
                              FROM    seguimiento_cx_canal
                              WHERE   canal like '".$CANAL."'
                              AND     fecha like '".$FECHA_QUERY."%'");
    return $resultado;
  }

  function max_peti($CANAL){
    $resultado = mysql_query("SELECT  max(peticiones) as max_peticiones
                              FROM    seguimiento_cx_canal
                              WHERE   canal like '".$CANAL."'
                              and fecha < curdate()");
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

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  $particularesHoy = busqueda('%particulares%',$newTo);
  $globalHoy = busqueda('%global%',$newTo);
  $KQOFHoy = busqueda('%KQOF%',$newTo);

  $particularesPasada = busqueda('%Particulares%',$newFrom);
  $globalPasada = busqueda('%global%',$newFrom);
  $KQOFPasada = busqueda('%KQOF%',$newFrom);

  $maxPeticiones = max_peti('%KQOF%');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";


    $r8 = mysql_fetch_array($maxPeticiones);
    $max_peti['value'] = $r8['max_peticiones'];

  while($r1 = mysql_fetch_array($particularesPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
      }
  while($r2 = mysql_fetch_array($globalPasada)) {
        $series2['data'][] = $r2['peticiones'];
      }
  while($r3 = mysql_fetch_array($KQOFPasada)) {
        $series3['data'][] = $r3['peticiones'];
        $series7['data'][] = $max_peti['value'];
      }

  while($r4 = mysql_fetch_array($particularesHoy)) {
        $series4['data'][] = $r4['peticiones'];
      }
  while($r5 = mysql_fetch_array($globalHoy)) {
        $series5['data'][] = $r5['peticiones'];
      }
  while($r6 = mysql_fetch_array($KQOFHoy)) {
        $series6['data'][] = $r6['peticiones'];
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>
