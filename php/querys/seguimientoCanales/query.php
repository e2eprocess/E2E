<?php


function total_peti($FROM, $TO){
  global $db_con;
  $query="SELECT sum(md.datavalue) total
                FROM \"E2E\".monitordata md
                WHERE md.timedata between '".$FROM."' and '".$TO."'
                AND md.idmonitor  = 361";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

/*La función maxPeti2 es la misma que la 1 con la salvedad de que tira contra el acumulado de APX y solo sacael día en el que se alcanza el máximo pod día*/
function max_peti2($CANAL){
  global $db_con;
  $query="SELECT to_char(apx.dia, 'dd/mm/yy-HH:mi PM') as fecha,
          to_char(apx.dia, 'yyyy-mm-dd') as fecha_max,
          apx.total as max_peticiones
          FROM (SELECT date(md.timedata) dia, sum(md.datavalue) total
                FROM \"E2E\".monitordata md
                WHERE md.idmonitor  = 361
                GROUP BY 1
                ORDER BY 2 DESC) apx
          LIMIT 1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busqueda($CANAL,$FROM,$TO,$KPI){
  global $db_con;
  $query="SELECT (extract(epoch from a.timedata))::NUMERIC as x,
            A.datavalue as y
          FROM \"E2E\".monitordata A, \"E2E\".monitor B, \"E2E\".kpi C
          WHERE B.name = '".$CANAL."'
            AND A.timedata between '".$FROM."' and '".$TO."'
            AND C.name = '".$KPI."'
            AND C.idkpi = A.idkpi
            AND B.idmonitor = A.idmonitor
          ORDER BY 1 asc";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

function busquedaAPX($CANAL,$FROM,$TO,$KPI){
  global $db_con;
  $query="SELECT (extract(epoch from c.timedata))::NUMERIC as x,
            sum(c.datavalue) as y
          FROM \"E2E\".uuaa a, \"E2E\".monitor b, \"E2E\".monitordata c, \"E2E\".kpi d
          WHERE a.name like '".$CANAL."'
            AND a.iduuaa <> 13
            AND a.iduuaa = b.iduuaa
            AND d.name = '".$KPI."'
            AND c.idkpi = d.idkpi
            AND b.idmonitor = c.idmonitor
            AND c.timedata between '".$FROM."' and '".$TO."'
            GROUP BY 1
            ORDER BY 1";
  $resultado = pg_query($db_con, $query);
  return $resultado;
}

?>
