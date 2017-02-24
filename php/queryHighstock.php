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

function busquedaPeticiones($FECHA){
  global $db_con;
  $query="SELECT *
          FROM \"E2E\".crosstab('SELECT (extract(epoch from A.timedata))::NUMERIC as fecha,
      		   b.name as atributo,
      		   a.datavalue as valor
      	   FROM \"E2E\".monitordata a, \"E2E\".monitor b, \"E2E\".kpi c
      	   WHERE b.name in (''kyop_mult_web_kyoppresentation'', ''kyfb_mult_web_firmas'',
      	     					''kyfb_mult_web_kyfbws'', ''kygu_mult_web_frontusuario'', ''kygu_mult_web_serviciosusuario'',
      	     					''kyos_mult_web_servicios'',''kyos_mult_web_posicioncuentas'')
      	   AND	a.idmonitor = b.idmonitor
      	   AND	a.idkpi = c.idkpi
      	   and c.name = ''Throughput''
        		AND timedata between ''2016-09-26 00:00'' and ''".$FECHA."''
      	   ORDER BY fecha, atributo') AS recursos (
      			fecha NUMERIC,
      			 KYFB_FIRMAS NUMERIC,
      		    KYFB_KYFBWS NUMERIC,
      		    KYGU_FRONT NUMERIC,
      			 KYGU_SERVICIOS NUMERIC,
      			 KYOP NUMERIC,
      			 KYOS_POSICION NUMERIC,
      			 KYOS_SERVICIOS NUMERIC);";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}




?>
