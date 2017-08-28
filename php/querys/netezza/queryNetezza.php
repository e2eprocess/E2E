<?php

  function batch($from,$to) {
    global $db_con_net;
    $query="SELECT DATE AS FECHA, substr(time,1,2) as TIME, COUNT(*) AS EJECS
            FROM CFSC..MVS_ADDRDISTR_H A
            LEFT JOIN CFSC..MVS_SYSPLEX B
            ON A.MVS_SYSTEM_ID = B.MVS_SYSTEM_ID
            WHERE DATE >= '".$from."'
            AND DATE <= '".$to."'
            AND EXTRACT(dow from DATE) NOT IN (1,7)
            AND SUBSYSTEM_ID = 'JES2'
            AND SYSPLEX_NAME = 'PLXEXP'
            AND (WORKLOAD_NAME LIKE 'BATCH%' OR WORKLOAD_NAME = 'PS_ONLI')
            GROUP BY DATE, TIME
            ORDER BY 1, 2";
    $resultado = odbc_exec($db_con_net,$query);
    return $resultado;
  }

  function online($from,$to) {
    global $db_con_net;
    $query="SELECT DATE AS FECHA, substr(time,1,2) AS HORA, SUM(TRANSACTIONS) AS EJECS
            FROM CFSC..IMS_LEV_STAT_H
            WHERE DATE >= '".$from."'
            AND DATE <= '".$to."'
            AND EXTRACT(dow from DATE) NOT IN (1,7)
            AND IMS_SUBSYSTEM_NAME IN ('IMSEXT01', 'IMSEXT02', 'IMSEXT03', 'IMSEXT04')
            AND TRANSACTION_NAME NOT LIKE '$%'
            GROUP BY 1, 2
            ORDER BY 1,2";
    $resultado = odbc_exec($db_con_net,$query);
    return $resultado;
  }

  function Consumo_MIPS($from,$to,$lparProduccion) {
    global $db_con_net;
    $query="SELECT /*{fn CONCAT ({fn CONCAT (FECHA, '-')},HORA)} AS FECHA*/
                FECHA
                ,HORA
                ,SUM(MIPS_LPAR_CONSUMO) AS MIPS
                ,SUM(MIPS_MAQUINA) AS CONSUMO_MAQUINA
                ,SUM(MIPS_MAQUINA_MAX) AS MAX_MAQUINA
            FROM(
              SELECT 	HMVSPM.DATE AS FECHA
                  , HMVSPM.TIME AS HORA
                  , HMVSPM.CPU_SERIAL_NO AS MAQUINA
                  , SUM(CPU_BUSY_MIPS/MEASURED_SEC) AS MIPS_LPAR_CONSUMO
                  , AVG(MIPS_MAQUINA_CONSUMO) AS MIPS_MAQUINA
                  , AVG(MIPS_TOT_CAPACITY) AS MIPS_MAQUINA_MAX
              FROM CFSC..MVSPM_LPAR_ACT AS HMVSPM
                  LEFT JOIN (
                    SELECT 	FECHA
                        ,HORA
                        ,MAQUINA
                        , SUM(MIPS_MAQUINA_CONSUMO) AS MIPS_MAQUINA_CONSUMO
                        FROM
                          (
                            SELECT 	FECHA
                                ,HORA
                                ,MAQUINA
                                ,LPAR
                                ,SUM(CPU_BUSY_MIPS/MEASURED_SEC) AS MIPS_MAQUINA_CONSUMO
                            FROM (
                              SELECT 	DATE AS FECHA
                                  ,TIME AS HORA
                                  ,LPAR_NAME AS LPAR
                                  ,CPU_BUSY_MIPS
                                  ,MEASURED_SEC
                                  ,CPU_SERIAL_NO AS MAQUINA
                              FROM CFSC..MVSPM_LPAR_ACT
                              WHERE DATE >= '".$from."'
                              AND DATE <= '".$to."'
                              AND EXTRACT(dow from DATE) NOT IN (1,7)
                                AND PROCESSOR_TYPE = 'CP'
                            ) AS T1
                            GROUP BY FECHA, HORA, MAQUINA, LPAR
                          ) AS T2
                          GROUP BY FECHA, HORA, MAQUINA
                          ORDER BY 1, 2 ,3
                        )AS HSINUSO
                ON	HMVSPM.DATE = HSINUSO.FECHA
                AND HMVSPM.TIME = HSINUSO.HORA
                AND HMVSPM.CPU_SERIAL_NO = HSINUSO.MAQUINA
                WHERE HMVSPM.DATE >= '".$from."'
                AND DATE <= '".$to."'
                AND EXTRACT(dow from DATE) NOT IN (1,7)
                AND PROCESSOR_TYPE = 'CP'
                AND LPAR_NAME IN (".$lparProduccion.")
                GROUP BY 1,2,3) AS TABLA_FINAL
            GROUP BY 1,2
            ORDER BY 1,2";
    $resultado = odbc_exec($db_con_net,$query);
    return $resultado;
  }

  function maxEjecuciones($HOY,$FECHA) {
    global $db_con_net;
    $query="SELECT * 
            FROM (
              SELECT FECHA, EJECS
              FROM (
                SELECT DATE AS FECHA, SUM(MSGQ_TRANSACTIONS+EMH_TRANSACTIONS) AS EJECS
                FROM CFSC..IMS_TRAN_H
                WHERE DATE < '".$HOY."'
                AND DATE >= '2016-11-01'
                AND IMS_SYSTEM_ID IN ('IMSEXT01', 'IMSEXT02', 'IMSEXT03', 'IMSEXT04')
                AND TRANSACTION_NAME NOT LIKE '$%'
                GROUP BY DATE
              ) AS H01
              ORDER BY EJECS DESC
              LIMIT 2) AS H02
            WHERE FECHA <> '".$FECHA."'
            LIMIT 1";
    $resultado = odbc_exec($db_con_net,$query);
    return $resultado;
  }

  function lparSysplex($SYSPLEX){
    global $db_con_net;
    $query="SELECT LPAR_NAME, LPARH.MVS_SYSTEM_ID AS MVS, SYSPLEX_NAME AS SYSPLEX
            FROM CFSC..MVSPM_LPAR_H AS LPARH
            LEFT JOIN CFSC..MVS_SYSPLEX AS MVSYS
            ON  LPARH.MVS_SYSTEM_ID = MVSYS.MVS_SYSTEM_ID
            WHERE DATE BETWEEN '2016-01-31' AND '2016-01-31'
            AND PROCESSOR_TYPE = 'CP'
            AND LPAR_NO = FROM_LPAR_NO
            AND SYSPLEX = '".$SYSPLEX."'
            GROUP BY LPAR_NAME, LPARH.MVS_SYSTEM_ID, SYSPLEX_NAME
            ORDER BY 1, 2";
    $resultado = odbc_exec($db_con_net,$query);
    return $resultado;
  }

  function peticionesDia($FECHA){
    global $db_con_net;
    $query="SELECT   DATE 
              , SUM(EMH_TRANSACTIONS)+SUM(MSGQ_TRANSACTIONS) AS EJEC 
              FROM CFSC.XAKGUTMOD1E.IMS_TRAN_H
              WHERE DATE = '".$FECHA."'
              AND IMS_SYSTEM_ID IN ('IMSEXT01', 'IMSEXT02', 'IMSEXT03', 'IMSEXT04')
              AND TRANSACTION_NAME NOT LIKE '$%'
              GROUP BY DATE
              order by 1,2";
    $resultado = odbc_exec($db_con_net,$query);
    return $resultado;
  }

  function onlineSeguimiento($FECHA){
     global $db_con_net;
      $query="SELECT EXTRACT(EPOCH FROM TIMESTAMP (to_timestamp(FECHA_HORA,'yyyy-mm-dd hh24:mi:ss'))) AS X,
              EJECS AS Y
              FROM
              (
                  SELECT FECHA,substr(time,1,5) AS HORA,FECHA || ' ' || TIME AS FECHA_HORA , EJECS FROM
                  (
                      SELECT substr(DATE,1,10) AS FECHA, TIME, SUM(TRANSACTIONS) AS EJECS
                                   FROM CFSC..IMS_LEV_STAT_H
                                   WHERE DATE = '".$FECHA."'
                                   AND IMS_SUBSYSTEM_NAME IN ('IMSEXT01', 'IMSEXT02', 'IMSEXT03', 'IMSEXT04')
                            AND TRANSACTION_NAME NOT LIKE '$%'
                                   GROUP BY 1,2
                      )AS CONS1
              ) AS CONS2
                           ORDER BY 1,2;";
      $resultado = odbc_exec($db_con_net,$query);
      return $resultado; 
  }

?>
