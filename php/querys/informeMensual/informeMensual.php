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

  function busquedaPeticiones($CANAL,$FECHA,$KPI){
    global $db_con;
    $query="SELECT B.name,
              to_char(A.timedata,'HH24:mi') as fecha,
              A.datavalue as peticiones
            FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
            WHERE B.name = '".$CANAL."'
              AND A.timedata::TEXT LIKE '".$FECHA."%'
              AND C.name = '".$KPI."'
              AND C.idkpi = A.idkpi
              AND B.idmonitor = A.idmonitor
            ORDER BY 2 asc";
    $resultado = pg_query($db_con, $query);
    return $resultado;
  }

  function busquedaPeticionesHoy($CANAL,$FECHAF,$FECHAT,$KPI){
    global $db_con;
    $query="SELECT B.name,
              to_char(A.timedata,'HH24:mi') as fecha,
              A.datavalue as peticiones
            FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
            WHERE B.name = '".$CANAL."'
              AND A.timedata between '".$FECHAF."' AND '".$FECHAT."'
              AND C.name = '".$KPI."'
              AND C.idkpi = A.idkpi
              AND B.idmonitor = A.idmonitor
            ORDER BY 2 asc";
    $resultado = pg_query($db_con, $query);
    return $resultado;
  }

  function max_peti($CANAL){
    global $db_con;
    $query="SELECT to_char(a.datemark, 'dd/mm/yy-HH:mi PM') as fecha,
            to_char(a.datemark, 'yyyy-mm-dd') as fecha_max,
            a.valuemark as max_peticiones
            FROM \"E2E\".watermark a, \"E2E\".monitor b
            WHERE a.idmonitor = b.idmonitor
            AND b.name = '".$CANAL."'
            ORDER BY 3 DESC
            LIMIT 1";
    $resultado = pg_query($db_con, $query);
    return $resultado;
  }

  function busquedaTime($CANAL,$FECHA,$KPI){
    global $db_con;
    $query="SELECT B.name,
              to_char(A.timedata,'HH24:mi') as fecha,
              A.datavalue as tiempo_respuesta
            FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
            WHERE B.name = '".$CANAL."'
              AND A.timedata::TEXT LIKE '".$FECHA."%'
              AND C.name = '".$KPI."'
              AND C.idkpi = A.idkpi
              AND B.idmonitor = A.idmonitor
            ORDER BY 2 asc";
    $resultado = pg_query($db_con, $query);
    return $resultado;
  }

  function busquedaTimeHoy($CANAL,$FECHAF,$FECHAT,$KPI){
    global $db_con;
    $query="SELECT B.name,
              to_char(A.timedata,'HH24:mi') as fecha,
              A.datavalue as tiempo_respuesta
            FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
            WHERE B.name = '".$CANAL."'
              AND A.timedata between '".$FECHAF."' AND '".$FECHAT."'
              AND C.name = '".$KPI."'
              AND C.idkpi = A.idkpi
              AND B.idmonitor = A.idmonitor
            ORDER BY 2 asc";
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
