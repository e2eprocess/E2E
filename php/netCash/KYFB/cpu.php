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
    $apbad022_To = seguimientoCPUHoy('apbad022',$newToF,$newTo,'netcash','KYFB%','CPU');
    $apbad023_To = seguimientoCPUHoy('apbad023',$newToF,$newTo,'netcash','KYFB%','CPU');
    $apbad024_To = seguimientoCPUHoy('apbad024',$newToF,$newTo,'netcash','KYFB%','CPU');
    $apbad026_To = seguimientoCPUHoy('apbad026',$newToF,$newTo,'netcash','KYFB%','CPU');
  }else{
    $apbad022_To = seguimientoCPU('apbad022',$newTo,'netcash','KYFB%','CPU');
    $apbad023_To = seguimientoCPU('apbad023',$newTo,'netcash','KYFB%','CPU');
    $apbad024_To = seguimientoCPU('apbad024',$newTo,'netcash','KYFB%','CPU');
    $apbad026_To = seguimientoCPU('apbad026',$newTo,'netcash','KYFB%','CPU');
  }
  $apbad022_From = seguimientoCPU('apbad022',$newFrom,'netcash','KYFB%','CPU');
  $apbad023_From = seguimientoCPU('apbad023',$newFrom,'netcash','KYFB%','CPU');
  $apbad024_From = seguimientoCPU('apbad024',$newFrom,'netcash','KYFB%','CPU');
  $apbad026_From = seguimientoCPU('apbad026',$newFrom,'netcash','KYFB%','CPU');



  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($apbad022_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['cpu'];
      }
  while($r2 = pg_fetch_assoc($apbad023_From)) {
        $series2['data'][] = $r2['cpu'];
      }
  while($r3 = pg_fetch_assoc($apbad024_From)) {
        $series3['data'][] = $r3['cpu'];
      }
  while($r4 = pg_fetch_assoc($apbad026_From)) {
        $series4['data'][] = $r4['cpu'];
      }
    while($r5 = pg_fetch_assoc($apbad022_To)) {
        $series5['data'][] = $r5['cpu'];
      }
  while($r6 = pg_fetch_assoc($apbad023_To)) {
        $series6['data'][] = $r6['cpu'];
      }
  while($r7 = pg_fetch_assoc($apbad024_To)) {
        $series7['data'][] = $r7['cpu'];
      }
  while($r8 = pg_fetch_assoc($apbad026_To)) {
        $series8['data'][] = $r8['cpu'];
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
  array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
