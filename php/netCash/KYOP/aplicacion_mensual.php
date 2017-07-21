<?php
require_once("../../conexion_e2e_process.php");
require_once("../../queryinformeTags.php");

$hoy= date("Y-m-d H:m", strtotime('-10 minute'));

$kyop_mult_web_kyoppresentationTime = tiempo('kyop_mult_web_kyoppresentation',$hoy,'40 days');
$kyop_mult_web_kyoppresentationPeti = peticiones('kyop_mult_web_kyoppresentation',$hoy,'40 days');

while($r1  = pg_fetch_assoc($kyop_mult_web_kyoppresentationTime)) {
      $series1[] = $r1;
    }
while($r2  = pg_fetch_assoc($kyop_mult_web_kyoppresentationPeti)) {
      $series2[] = $r2;
    }


$datos = array();
array_push($datos,$series1);
array_push($datos,$series2);


print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
