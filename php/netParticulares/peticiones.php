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
    $particularesHoy = busquedaHoy('kqof_particulares',$newToF,$newTo);
    $globalHoy = busquedaHoy('kqof_posicionGlobal',$newToF,$newTo);
    $KQOFHoy = busquedaHoy('kqof_es_web',$newToF,$newTo);

  }
  else {
    $particularesHoy = busqueda('kqof_particulares',$newTo);
    $globalHoy = busqueda('kqof_posicionGlobal',$newTo);
    $KQOFHoy = busqueda('kqof_es_web',$newTo);
  }
  $particularesPasada = busqueda('kqof_particulares',$newFrom);
  $globalPasada = busqueda('kqof_posicionGlobal',$newFrom);
  $KQOFPasada = busqueda('kqof_es_web',$newFrom);

  $maxPeticiones = max_peti('Throughput kqof');

  /*Recuperación datos*/
  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  $r8 = pg_fetch_assoc($maxPeticiones);
  $max_peti['value'] = $r8['max_peticiones'];

  while($r1 = pg_fetch_assoc($particularesPasada)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['peticiones'];
      }
  while($r2 = pg_fetch_assoc($globalPasada)) {
        $series2['data'][] = $r2['peticiones'];
      }
  while($r3 = pg_fetch_assoc($KQOFPasada)) {
        $series3['data'][] = $r3['peticiones'];
        $series7['data'][] = $max_peti['value'];
      }
  while($r4 = pg_fetch_assoc($particularesHoy)) {
        $series4['data'][] = $r4['peticiones'];
      }
  while($r5 = pg_fetch_assoc($globalHoy)) {
        $series5['data'][] = $r5['peticiones'];
      }
  while($r6 = pg_fetch_assoc($KQOFHoy)) {
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

  pg_close($db_con);


?>
