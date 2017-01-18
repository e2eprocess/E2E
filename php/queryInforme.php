<?php

function recursos($CLON,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab('SELECT to_char(date_trunc(''hours'', B.timedata),''dd/mm/yy hh24'') as fecha,
					     c.name as nombre,
               max(B.datavalue) as valor
          FROM \"E2E\".clon A, \"E2E\".clondata B, \"E2E\".kpi C
          WHERE A.name = ''".$CLON."''
            AND B.timedata > (TIMESTAMP''".$FECHA."'' - INTERVAL ''".$INTERVALO."'')
            AND B.timedata <= (TIMESTAMP''".$FECHA."'')
            AND C.name in (''CPU'', ''Memory'')
            AND B.idkpi = c.idkpi
            AND A.idclon = B.idclon
            GROUP BY 1,2
          ORDER BY 1,2 asc')
	           AS recursos(fecha TEXT, cpu NUMERIC, memoria NUMERIC)";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function aplicacion($CLON,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab('SELECT to_char(date_trunc(''hours'', B.timedata),''dd/mm/yy hh24'') as fecha,
					     c.name as nombre,
               max(B.datavalue) as valor
          FROM \"E2E\".monitor A, \"E2E\".monitordata B, \"E2E\".kpi C
          WHERE A.name = ''".$CLON."''
            AND B.timedata > (TIMESTAMP''".$FECHA."'' - INTERVAL ''".$INTERVALO."'')
            AND B.timedata <= (TIMESTAMP''".$FECHA."'')
            AND C.name in (''Throughput'', ''Time'')
            AND B.idkpi = c.idkpi
            AND A.idmonitor = B.idmonitor
            GROUP BY 1,2
          ORDER BY 1,2 asc')
	           AS recursos(fecha TEXT, peticiones NUMERIC, tiempo_respuesta NUMERIC)";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}




 ?>