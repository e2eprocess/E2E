<?php

  function batch($FECHA) {
    global $db_con;
    $query="SELECT DATE AS FECHA, TIME, COUNT(*) AS EJECS
            FROM CFSC..MVS_ADDRDISTR_H A
            LEFT JOIN CFSC..MVS_SYSPLEX B
            ON A.MVS_SYSTEM_ID = B.MVS_SYSTEM_ID
            WHERE DATE = '".$FECHA."'
            AND SUBSYSTEM_ID = 'JES2'
            AND SYSPLEX_NAME = 'PLXEXP'
            AND (WORKLOAD_NAME LIKE 'BATCH%' OR WORKLOAD_NAME = 'PS_ONLI')
            GROUP BY DATE, TIME
            ORDER BY 1, 2";
    $resultado = odbc_exec($db_con,$query);
    return $resultado;
  }

  function online($FECHA) {
    global $db_con;
    $query="SELECT DATE AS FECHA, TIME, SUM(TRANSACTIONS) AS EJECS
            FROM CFSC..IMS_LEV_STAT_H
            WHERE DATE = '".$FECHA."'
            AND IMS_SUBSYSTEM_NAME IN ('IMSEXT01', 'IMSEXT02', 'IMSEXT03', 'IMSEXT04')
            AND TRANSACTION_NAME NOT LIKE '$%'
            GROUP BY 1,2
            ORDER BY 1,2";
    $resultado = odbc_exec($db_con,$query);
    return $resultado;
  }

  function Consumo_MIPS($FECHA) {
    global $db_con;
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
                              WHERE DATE = '".$FECHA."'
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
                WHERE HMVSPM.DATE = '".$FECHA."'
                AND PROCESSOR_TYPE = 'CP'
                AND LPAR_NAME IN ('ARIEL41 ','ARIEL43 ','ARIEL45 ','ARIEL46 ',
                                  'ARIEL48 ','CASIO52 ','CASIO53 ','CASIO55 ',
                                  'CASIO56 ','CASIO58 ')
                GROUP BY 1,2,3) AS TABLA_FINAL
            GROUP BY 1,2
            ORDER BY 1,2";
    $resultado = odbc_exec($db_con,$query);
    return $resultado;
  }

?>
