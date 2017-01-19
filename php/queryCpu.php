<?php

function busquedaMaquina($MAQUINA,$FECHA){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as cpu
          FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
          WHERE A.name = '".$MAQUINA."'
            AND B.timedata::TEXT LIKE '".$FECHA."%'
            AND C.name = 'CPU'
            AND B.idkpi = c.idkpi
            AND A.idhost = B.idhost
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaMaquinaHoy($MAQUINA,$FECHAF,$FECHAT){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as cpu
          FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
          WHERE A.name = '".$MAQUINA."'
            AND B.timedata between '".$FECHAF."' AND '".$FECHAT."'
            AND C.name = 'CPU'
            AND B.idkpi = c.idkpi
            AND A.idhost = B.idhost
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaClon($CLON,$FECHA){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as cpu
          FROM \"E2E\".clon A, \"E2E\".clondata B, \"E2E\".kpi C
          WHERE A.name = '".$CLON."'
            AND B.timedata::TEXT LIKE '".$FECHA."%'
            AND C.name = 'CPU'
            AND B.idkpi = c.idkpi
            AND A.idclon = B.idclon
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaClonHoy($CLON,$FECHAF,$FECHAT){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as cpu
          FROM \"E2E\".clon A, \"E2E\".clondata B, \"E2E\".kpi C
          WHERE A.name = '".$CLON."'
            AND B.timedata between '".$FECHAF."' AND '".$FECHAT."'
            AND C.name = 'CPU'
            AND B.idkpi = c.idkpi
            AND A.idclon = B.idclon
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function visionMaquina($MAQUINA,$FECHA,$INTERVALO){
  global $db_con;
  $query="SELECT to_char(B.timedata,'dd/mm/yy HH24') as fecha,
		            B.datavalue as cpu
          FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
          WHERE A.name = '".$MAQUINA."'
            AND B.timedata > (DATE'".$FECHA."' - INTERVAL '".$INTERVALO."')
            AND B.timedata <= (DATE'".$FECHA."')
            AND C.name = 'CPU'
            AND B.idkpi = c.idkpi
            AND A.idhost = B.idhost
          ORDER BY b.timedata asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function seguimientoCPU($MAQUINA,$FECHA,$CANAL,$CLON,$KPI){
  global $db_con;
  $query="SELECT to_char(A.timedata,'HH24:mi') as fecha,
		      sum(a.datavalue) as cpu
          FROM \"E2E\".clondata a, \"E2E\".clon B, \"E2E\".host c, \"E2E\".channel d, \"E2E\".kpi e
          WHERE a.idclon = b.idclon
          AND b.idhost = c.idhost
          AND b.idchannel = d.idchannel
          AND a.idkpi = e.idkpi
          AND c.name = '".$MAQUINA."'
          AND a.timedata::text like '".$FECHA."%'
          AND d.name = '".$CANAL."'
          AND b.name::text like '".$CLON."%'
          AND e.name = '".$KPI."'
          GROUP BY 1
          ORDER BY 1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function seguimientoCPUHoy($MAQUINA,$FECHAF,$FECHAT,$CANAL,$CLON,$KPI){
  global $db_con;
  $query="SELECT to_char(A.timedata,'HH24:mi') as fecha,
		      sum(a.datavalue) as cpu
          FROM \"E2E\".clondata a, \"E2E\".clon B, \"E2E\".host c, \"E2E\".channel d, \"E2E\".kpi e
          WHERE a.idclon = b.idclon
          AND b.idhost = c.idhost
          AND b.idchannel = d.idchannel
          AND a.idkpi = e.idkpi
          AND c.name = '".$MAQUINA."'
          AND A.timedata between '".$FECHAF."' AND '".$FECHAT."'
          AND d.name = '".$CANAL."'
          AND b.name::text like '".$CLON."%'
          AND e.name = '".$KPI."'
          GROUP BY 1
          ORDER BY 1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}



?>
