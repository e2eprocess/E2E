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
  $query="SELECT to_char(a.datemark, 'dd/mm/yy-HH:mi PM') as fecha,
          to_char(a.datemark, 'yyyy-mm-dd') as fecha_max,
          a.valuemark as max_peticiones
          FROM \"E2E\".watermark a, \"E2E\".monitor b
          WHERE a.idmonitor = b.idmonitor
          AND b.name = '".$CANAL."'
          ORDER BY 3 DESC
          LIMIT 1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

/*function max_peti($CANAL){
  global $db_con;
  $query="SELECT A.datemark as fecha,
          A.valuemark as max_peticiones
          FROM \"E2E\".watermark A, \"E2E\".monitor B, \"E2E\".kpi C
          WHERE B.name='".$CANAL."'
          AND A.idmonitor = B.idmonitor
          AND C.name = 'Throughput'
          AND A.idkpi = C.idkpi
          ORDER BY 2 DESC";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}*/

?>
