<?php
  include("../../conexion_e2e_process.php");

  /*Query fecha menos 24 horas
  function busqueda($CANAL,$FECHA_QUERY){
    $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                      peticiones,
                                      max_peticiones
                              FROM    seguimiento_cx_canal
                              WHERE   canal like '".$CANAL."'
                              AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 24 HOUR)
                              AND     fecha <= '".$FECHA_QUERY."'");
    return $resultado;
  }*/

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

  function busquedaHoy($CANAL,$FECHAF,$FECHAT){
  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%k:%i')as fecha,
                                    peticiones,
                                    max_peticiones
                            FROM    seguimiento_cx_canal
                            WHERE   canal like '".$CANAL."'
                            AND     fecha between  '".$FECHAF."' and '".$FECHAT."'");
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

  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  /*gestion fechas*/
  if(date("Y-m-d")==$newTo){
    $min = 11;
    if(date("i")<$min){
      $newTo = date("Y-m-d H", strtotime('-2 hour'));
      $newToF = date("Y-m-d 00");
    }else {
      $newTo = date("Y-m-d H", strtotime('-1 hour'));
      $newToF = date("Y-m-d 00");
    }
    $peticionesHoy = busquedaHoy('cash',$newToF,$newTo);

  }
  else {
    $peticionesHoy = busqueda('cash',$newTo);
  }
  $peticionesPasada = busqueda('cash', $newFrom);

  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";


  while($r1  = mysql_fetch_array($peticionesPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
        $series3['data'][] = $r1['max_peticiones'];
      }

  while($r2 = mysql_fetch_array($peticionesHoy)) {
        $series2['data'][] = $r2['peticiones'];
      }

  $datos = array();
  array_push($datos,$category);
  array_push($datos,$series1);
  array_push($datos,$series2);
  array_push($datos,$series3);
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  mysql_close($conexion);

?>