<?php

function busqueda($CANAL,$FECHA,$KPI){
  global $db_con;
  $query="SELECT B.name,
            to_char(A.timedata,'HH24:mi') as fecha,
            A.datavalue as peticiones
          FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
          WHERE B.name = '".$CANAL."'
            AND A.timedata::TEXT LIKE '".$FECHA."%'
            AND C.name = '".$KPI."'
            AND C.idkpi = A.idkpi
            AND B.idmonitor = A.idmonitor
          ORDER BY 2 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaHoy($CANAL,$FECHAF,$FECHAT,$KPI){
  global $db_con;
  $query="SELECT B.name,
            to_char(A.timedata,'HH24:mi') as fecha,
            A.datavalue as peticiones
          FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
          WHERE B.name = '".$CANAL."'
            AND A.timedata between '".$FECHAF."' AND '".$FECHAT."'
            AND C.name = '".$KPI."'
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

 ?>
