<?php

function busqueda($FECHA){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab(
								'SELECT (extract(epoch from timedata))::NUMERIC as fecha,
							        A.name as atributo,
							        B.datavalue as valor
						      FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
						      WHERE A.idhost IN (1,2,3,4)
						      AND C.name =''CPU''
						      AND B.idkpi = c.idkpi
						      AND A.idhost = B.idhost
                  AND timedata < ''".$FECHA."''
					      UNION ALL
						    SELECT (extract(epoch from A.timedata))::NUMERIC as fecha,
							        c.name as atributo,
							        a.datavalue as valor
						     FROM \"E2E\".monitordata a, \"E2E\".monitor b, \"E2E\".kpi c
						     WHERE b.name = ''kqof_es_web''
						     AND	a.idmonitor = b.idmonitor
						     AND	a.idkpi = c.idkpi
                 AND timedata < ''".$FECHA."''
						    ORDER BY fecha, atributo')
        AS recursos (fecha NUMERIC,
				      APBAD002 NUMERIC,
		          APBAD003 NUMERIC,
		          APBAD004 NUMERIC,
				      APBAD006 NUMERIC,
				      peticiones NUMERIC,
				      TIEMPO NUMERIC);";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

?>
