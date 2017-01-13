<?php
require_once("../../conexion_e2e_process.php");

function busqueda($MAQUINA,$INSTANCIAS,$FECHA_QUERY){

  $resultado = mysql_query("SELECT  DATE_FORMAT(fecha, '%d/%m/%y-%k')as fecha,
                                    cpu,
                                    memoria
                            FROM    informe_instancias
                            WHERE   maquina = '".$MAQUINA."'
                            AND     instancias = '".$INSTANCIAS."'
                            AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 10 DAY)
                            AND     fecha <= '".$FECHA_QUERY."'");

  return $resultado;

}

$category = array();
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

$minuto = 10;

if(date("i")<$minuto){
  $hoy = date("Y-m-d H", strtotime('-2 hour'));
}else{
  $hoy = date("Y-m-d H", strtotime('-1 hour'));
}

$ESMB_701_20 = busqueda('apbad002','ESMB_701_20',$hoy);
$ESMB_701_21 = busqueda('apbad002','ESMB_701_21',$hoy);
$ESMB_701_22 = busqueda('apbad002','ESMB_701_22',$hoy);
$ESMB_701_30 = busqueda('apbad003','ESMB_701_30',$hoy);
$ESMB_701_31 = busqueda('apbad003','ESMB_701_31',$hoy);
$ESMB_701_32 = busqueda('apbad003','ESMB_701_32',$hoy);
$ESMB_701_40 = busqueda('apbad004','ESMB_701_40',$hoy);
$ESMB_701_41 = busqueda('apbad004','ESMB_701_41',$hoy);
$ESMB_701_42 = busqueda('apbad004','ESMB_701_42',$hoy);
$ESMB_701_60 = busqueda('apbad006','ESMB_701_60',$hoy);
$ESMB_701_61 = busqueda('apbad006','ESMB_701_61',$hoy);
$ESMB_701_62 = busqueda('apbad006','ESMB_701_62',$hoy);

$category['name'] = 'fecha';

$ESMB_S01_25 = busqueda('apbad002','ESMB_S01_25',$hoy);
$ESMB_S01_26 = busqueda('apbad002','ESMB_S01_26',$hoy);
$ESMB_S01_35 = busqueda('apbad003','ESMB_S01_35',$hoy);
$ESMB_S01_36 = busqueda('apbad003','ESMB_S01_36',$hoy);
$ESMB_S01_45 = busqueda('apbad004','ESMB_S01_45',$hoy);
$ESMB_S01_46 = busqueda('apbad004','ESMB_S01_46',$hoy);
$ESMB_S01_65 = busqueda('apbad006','ESMB_S01_65',$hoy);
$ESMB_S01_66 = busqueda('apbad006','ESMB_S01_66',$hoy);

$category['name'] = 'fecha';

while($r1  = pg_fetch_assoc($ESMB_S01_25)) {
      $series1['data'][] = $r1['cpu'];
      $series2['data'][] = $r1['memoria'];
      $category['data'][] = $r1['dia'];
    }
while($r2  = pg_fetch_assoc($ESMB_S01_26)) {
      $series3['data'][] = $r2['cpu'];
      $series4['data'][] = $r2['memoria'];
    }
while($r4  = pg_fetch_assoc($ESMB_S01_35)) {
      $series5['data'][] = $r4['cpu'];
      $series6['data'][] = $r4['memoria'];
    }
while($r5  = pg_fetch_assoc($ESMB_S01_36)) {
      $series7['data'][] = $r5['cpu'];
      $series8['data'][] = $r5['memoria'];
    }
while($r7  = pg_fetch_assoc($ESMB_S01_45)) {
      $series9['data'][] = $r7['cpu'];
      $series10['data'][] = $r7['memoria'];
    }
while($r8  = pg_fetch_assoc($ESMB_S01_46)) {
      $series11['data'][] = $r8['cpu'];
      $series12['data'][] = $r8['memoria'];
    }
while($r10  = pg_fetch_assoc($ESMB_S01_65)) {
      $series13['data'][] = $r10['cpu'];
      $series14['data'][] = $r10['memoria'];
    }
while($r11  = pg_fetch_assoc($ESMB_S01_66)) {
      $series15['data'][] = $r11['cpu'];
      $series16['data'][] = $r11['memoria'];
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

print json_encode($datos, JSON_NUMERIC_CHECK);

mysql_close($conexion);

?>
