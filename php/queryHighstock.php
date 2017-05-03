<?php

function busqueda($CANAL,$FECHA,$IDHOST){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab(
								'SELECT (extract(epoch from timedata))::NUMERIC as fecha,
							        A.name as atributo,
							        B.datavalue as valor
						      FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
						      WHERE A.idhost IN (".$IDHOST.")
						      AND C.name =''CPU''
						      AND B.idkpi = c.idkpi
						      AND A.idhost = B.idhost
                  AND timedata < ''".$FECHA."''
					      UNION ALL
						    SELECT (extract(epoch from A.timedata))::NUMERIC as fecha,
							        c.name as atributo,
							        a.datavalue as valor
						     FROM \"E2E\".monitordata a, \"E2E\".monitor b, \"E2E\".kpi c
						     WHERE b.name = ''".$CANAL."''
						     AND	a.idmonitor = b.idmonitor
						     AND	a.idkpi = c.idkpi
                 AND timedata < ''".$FECHA."''
						    ORDER BY fecha, atributo')
        AS recursos (fecha NUMERIC,
				      cpu1 NUMERIC,
		          cpu2 NUMERIC,
		          cpu3 NUMERIC,
				      cpu4 NUMERIC,
				      peticiones NUMERIC,
				      TIEMPO NUMERIC);";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaOficinas($CANAL,$FECHA,$IDHOST){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab(
								'SELECT (extract(epoch from timedata))::NUMERIC as fecha,
							        A.name as atributo,
							        B.datavalue as valor
						      FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
						      WHERE A.idhost IN (".$IDHOST.")
						      AND C.name =''CPU''
						      AND B.idkpi = c.idkpi
						      AND A.idhost = B.idhost
                  AND timedata < ''".$FECHA."''
					      UNION ALL
						    SELECT (extract(epoch from A.timedata))::NUMERIC as fecha,
							        c.name as atributo,
							        a.datavalue as valor
						     FROM \"E2E\".monitordata a, \"E2E\".monitor b, \"E2E\".kpi c
						     WHERE b.name = ''".$CANAL."''
						     AND	a.idmonitor = b.idmonitor
						     AND	a.idkpi = c.idkpi
                 AND timedata < ''".$FECHA."''
						    ORDER BY fecha, atributo')
        AS recursos (fecha NUMERIC,
				      cpu1 NUMERIC,
		          cpu2 NUMERIC,
		          cpu3 NUMERIC,
              cpu4 NUMERIC,
              cpu5 NUMERIC,
              cpu6 NUMERIC,
              cpu7 NUMERIC,
				      peticiones NUMERIC,
				      TIEMPO NUMERIC);";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}




function enpsHighstock($FECHA) {
	global $db_con;
	$query="SELECT *
			FROM \"E2E\".crosstab(
			 'SELECT (extract(epoch from A.timedata))::NUMERIC as fecha,
										        b.name as atributo,
										        a.datavalue as valor
									     FROM \"E2E\".monitordata a, \"E2E\".monitor b
									     WHERE a.idmonitor in (14,15,18,19)
									     AND	a.idmonitor = b.idmonitor
									     AND	a.idkpi = 2
			                 		AND timedata <''".$FECHA."''
									    ORDER BY fecha, atributo') AS recursos (fecha numeric,
									    atr1 numeric,
									    atr2 numeric,
									    atr3 numeric,
									    atr4 numeric);";
	$resultado = pg_query($db_con, $query);
  	return $resultado;
}

?>