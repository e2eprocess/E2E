<?php

function busqueda($CANAL,$FROM,$TO,$KPI){
  global $db_con;
  $query="SELECT (extract(epoch from a.timedata))::NUMERIC as x,
            A.datavalue as y
          FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
          WHERE B.name = '".$CANAL."'
            AND A.timedata between '".$FROM."' and '".$TO."'
            AND C.name = '".$KPI."'
            AND C.idkpi = A.idkpi
            AND B.idmonitor = A.idmonitor
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaAPX($CANAL,$FROM,$TO,$KPI){
  global $db_con;
  $query="SELECT (extract(epoch from c.timedata))::NUMERIC as x,
            sum(c.datavalue) as y
          FROM \"E2E\".uuaa a, \"E2E\".monitor b, \"E2E\".monitordata c, \"E2E\".kpi d
          WHERE a.name like '".$CANAL."'
            AND a.iduuaa <> 13
            AND a.iduuaa = b.iduuaa
            AND d.name = '".$KPI."'
            AND c.idkpi = d.idkpi
            AND b.idmonitor = c.idmonitor
            AND c.timedata between '".$FROM."' and '".$TO."'
            GROUP BY 1
            ORDER BY 1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

?>
