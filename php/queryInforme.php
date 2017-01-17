<?php

function recursos($CLON,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab('SELECT to_char(B.timedata,''HH24:mi'') as fecha,
					     c.name as nombre,
               B.datavalue as cpu
          FROM \"E2E\".clon A, \"E2E\".clondata B, \"E2E\".kpi C
          WHERE A.name = ''".$CLON."''
            AND B.timedata > (DATE''".$FECHA."'' - INTERVAL ''".$INTERVALO."'')
            AND B.timedata <= (DATE''".$FECHA."'')
            AND C.name in (''CPU'', ''Memory'')
            AND B.idkpi = c.idkpi
            AND A.idclon = B.idclon
          ORDER BY 1,2 asc')
	           AS recursos(fecha TEXT, cpu NUMERIC, memoria NUMERIC)";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}


 ?>
