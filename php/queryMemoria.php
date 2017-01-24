<?php

function busquedaMaquina($MAQUINA,$FECHA){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as memoria
          FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
          WHERE A.name = '".$MAQUINA."'
            AND B.timedata::TEXT LIKE '".$FECHA."%'
            AND C.name = 'Memory'
            AND B.idkpi = c.idkpi
            AND A.idhost = B.idhost
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaMaquinaHoy($MAQUINA,$FECHAF,$FECHAT){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as memoria
          FROM \"E2E\".host A, \"E2E\".hostdata B, \"E2E\".kpi C
          WHERE A.name = '".$MAQUINA."'
            AND B.timedata between '".$FECHAF."' AND '".$FECHAT."'
            AND C.name = 'Memory'
            AND B.idkpi = c.idkpi
            AND A.idhost = B.idhost
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaClon($CLON,$FECHA){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as memoria
          FROM \"E2E\".clon A, \"E2E\".clondata B, \"E2E\".kpi C
          WHERE A.name = '".$CLON."'
            AND B.timedata::TEXT LIKE '".$FECHA."%'
            AND C.name = 'Memory'
            AND B.idkpi = c.idkpi
            AND A.idclon = B.idclon
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaClonHoy($CLON,$FECHAF,$FECHAT){
  global $db_con;
  $query="SELECT to_char(B.timedata,'HH24:mi') as fecha,
                 B.datavalue as memoria
          FROM \"E2E\".clon A, \"E2E\".clondata B, \"E2E\".kpi C
          WHERE A.name = '".$CLON."'
            AND B.timedata between '".$FECHAF."' AND '".$FECHAT."'
            AND C.name = 'Memory'
            AND B.idkpi = c.idkpi
            AND A.idclon = B.idclon
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

?>
