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

?>
