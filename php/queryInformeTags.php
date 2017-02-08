<?php

function recursos($CLON,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab('SELECT (extract(epoch from date_trunc(''hour'', B.timedata))::NUMERIC) * 1000,
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
	           AS recursos(fecha NUMERIC, cpu NUMERIC, memoria NUMERIC)";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function tiempo($MONITOR,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT (extract(epoch from date_trunc('hour', B.timedata))::NUMERIC) * 1000 as x,
         avg(B.datavalue)::DECIMAL(10,2) as y
          FROM \"E2E\".monitor A, \"E2E\".monitordata B, \"E2E\".kpi C
          WHERE A.name = '".$MONITOR."'
            AND B.timedata > (TIMESTAMP'".$FECHA."' - INTERVAL '".$INTERVALO."')
            AND B.timedata <= (TIMESTAMP'".$FECHA."')
            AND C.name = 'Time'
            AND B.idkpi = c.idkpi
            AND A.idmonitor = B.idmonitor
            GROUP BY 1
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function peticiones($MONITOR,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT (extract(epoch from date_trunc('hour', B.timedata))::NUMERIC) * 1000 as x,
         sum(B.datavalue)::DECIMAL(10,2) as y
          FROM \"E2E\".monitor A, \"E2E\".monitordata B, \"E2E\".kpi C
          WHERE A.name = '".$MONITOR."'
            AND B.timedata > (TIMESTAMP'".$FECHA."' - INTERVAL '".$INTERVALO."')
            AND B.timedata <= (TIMESTAMP'".$FECHA."')
            AND C.name = 'Throughput'
            AND B.idkpi = c.idkpi
            AND A.idmonitor = B.idmonitor
            GROUP BY 1
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function tags($MONITOR,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT (extract(epoch from timedata)::NUMERIC) * 1000 as x,
	        description as text,
	        tipo as title
          FROM comment
          where timedata > (TIMESTAMP'2017-01-27 13:58' - INTERVAL '10 days')
          AND timedata <= (TIMESTAMP'2017-01-27 13:58')";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}



 ?>
