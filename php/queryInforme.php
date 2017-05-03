<?php

function recursos($CLON,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT to_char(fecha, 'dd/mm/yy hh24') as fecha,
                  cpu, memoria
                  FROM 
                  (SELECT *
                  FROM \"E2E\".crosstab('SELECT date_trunc(''hour'', B.timedata) as fecha,
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
        	           AS recursos(fecha TIMESTAMP, cpu NUMERIC, memoria NUMERIC))AS T1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function tiempo($MONITOR,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT to_char(fecha, 'dd/mm/yy hh24') as fecha,
                nombre,
                tiempo_respuesta
          FROM
          (SELECT date_trunc('hour', B.timedata) as fecha,
			   c.name as nombre,
         avg(B.datavalue)::DECIMAL(10,2) as tiempo_respuesta
          FROM \"E2E\".monitor A, \"E2E\".monitordata B, \"E2E\".kpi C
          WHERE A.name = '".$MONITOR."'
            AND B.timedata > (TIMESTAMP'".$FECHA."' - INTERVAL '".$INTERVALO."')
            AND B.timedata <= (TIMESTAMP'".$FECHA."')
            AND C.name = 'Time'
            AND B.idkpi = c.idkpi
            AND A.idmonitor = B.idmonitor
            GROUP BY 1,2
          ORDER BY 2 asc) AS T1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function peticiones($MONITOR,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT to_char(fecha, 'dd/mm/yy hh24') as fecha,
                  nombre,
                  peticiones
              FROM
              (SELECT date_trunc('hour', B.timedata) as fecha,
    			     c.name as nombre,
              sum(B.datavalue)::DECIMAL(10,2) as peticiones
              FROM \"E2E\".monitor A, \"E2E\".monitordata B, \"E2E\".kpi C
              WHERE A.name = '".$MONITOR."'
                AND B.timedata > (TIMESTAMP'".$FECHA."' - INTERVAL '".$INTERVALO."')
                AND B.timedata <= (TIMESTAMP'".$FECHA."')
                AND C.name = 'Throughput'
                AND B.idkpi = c.idkpi
                AND A.idmonitor = B.idmonitor
                GROUP BY 1,2
              ORDER BY 2 asc) as t1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}





 ?>
