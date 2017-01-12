<?php
  require_once("../conexion_e2e_process.php");

  /*querys*/
  function busqueda($CANAL,$FECHA){
    global $db_con;
    $query="SELECT B.name,
              to_char(A.timedata,'HH24:mi') as fecha,
              A.datavalue as peticiones
            FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
            WHERE B.name = '".$CANAL."'
              AND A.timedata::TEXT LIKE '".$FECHA."%'
              AND C.name = 'Throughput'
              AND C.idkpi = A.idkpi
              AND B.idmonitor = A.idmonitor
            ORDER BY 2 asc";
    $resultado = pg_query($db_con, $query);
    return $resultado;
  }

  function busquedaHoy($CANAL,$FECHAF,$FECHAT){
    global $db_con;
    $query="SELECT B.name,
              to_char(A.timedata,'HH24:mi') as fecha,
              A.datavalue as peticiones
            FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
            WHERE B.name = '".$CANAL."'
              AND A.timedata between '".$FECHAF."' AND '".$FECHAT."'
              AND C.name = 'Throughput'
              AND C.idkpi = A.idkpi
              AND B.idmonitor = A.idmonitor
            ORDER BY 2 asc";
    $resultado = pg_query($db_con, $query);
    return $resultado;
  }

  function max_peti($CANAL){
    global $db_con;
    $query="SELECT name,
            MAX(valuemark) as max_peticiones,
            datemark
            FROM \"E2E\".watermark
            WHERE name='".$CANAL."'
            GROUP BY 1,3";
    $resultado = pg_query($db_con, $query);
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
      $newTo = date("Y-m-d H:i", strtotime('-2 hour'));
      $newToF = date("Y-m-d 00:00");
    }else {
      $newTo = date("Y-m-d H:i", strtotime('-1 hour'));
      $newToF = date("Y-m-d 00:00");
    }
    $peticionesHoy = busquedaHoy('enpp_mult_web',$newToF,$newTo);
  }
  else {
    $peticionesHoy = busqueda('enpp_mult_web',$newTo);
  }
  $peticionesPasada = busqueda('enpp_mult_web', $newFrom);
  $maxPeticiones = max_peti('Throughput enpp');

  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  $r8 = pg_fetch_assoc($maxPeticiones);
  $max_peti['value'] = $r8['max_peticiones'];

  while($r1  = pg_fetch_assoc($peticionesPasada)) {
        $series1['data'][] = $r1['peticiones'];
        $category['data'][] = $r1['fecha'];
        $series3['data'][] = $max_peti['value'];

      }

  while($r2 = pg_fetch_assoc($peticionesHoy)) {
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
