<html>
  <body>
    <?php
        include("../php/conexion_e2e_process.php");

        function mediaAplicaciones($FECHA_QUERY,$UUAA){

          $resultado = mysql_query("SELECT  canal,
                                            FORMAT(AVG(Tiempo_respuesta),2,'de_DE') as Tiempo_respuesta,
                                            FORMAT((SUM(Peticiones)/10),2,'de_DE') as Peticiones
                                    FROM    seguimiento_cx_canal
                                    WHERE   canal like '".$UUAA."_%'
                                    AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 10 DAY)
                                    AND     fecha <= '".$FECHA_QUERY."'
                                    GROUP BY canal");

          return $resultado;

        }

        function mediaInstancias($FECHA_QUERY,$UUAA){

          $resultado = mysql_query("SELECT  maquina, instancias,
                                            FORMAT(AVG(Cpu),2,'de_DE') as Cpu,
                                            FORMAT(AVG(Memoria),2,'de_DE') as Memoria
                                    FROM    informe_instancias
                                    WHERE   instancias like '".$UUAA."_%'
                                    AND     fecha > DATE_SUB('".$FECHA_QUERY."', INTERVAL 10 DAY)
                                    AND     fecha <= '".$FECHA_QUERY."'
                                    GROUP BY maquina, instancias");

          return $resultado;

        }

        $minuto = 10;

        if(date("i")<$minuto){
          $hoy = date("Y-m-d H", strtotime('-2 hour'));
        }else{
          $hoy = date("Y-m-d H", strtotime('-1 hour'));
        }

        echo "<table border=1 cellpading=4 cellspacing=0>";

        $aplicaciones = mediaAplicaciones($hoy,'kyfb');
        echo "<caption>Últimos 10 días</caption>
              <tr>
                <th colspan = 3> Rendimiento por aplicación</th>
              </tr>
              <tr>
                <th>Aplicación</th>
                <th>Tiempo medio Respuesta</th>
                <th>Promedio peticiones/día</th>
              </tr>";

        while($row = mysql_fetch_array($aplicaciones)){
          echo "<tr>";
            echo "<td>".$row['canal']."</td>";
            echo "<td>".$row['Tiempo_respuesta']." ms</td>";
            echo "<td>".$row['Peticiones']."</td>";
          echo "</tr>";
        }

        $recursos = mediaInstancias($hoy,'KYFB');
        echo "<tr>
                <th colspan=3> Consumo medio de recursos </th>
              </tr>
              <tr>
                <th>Instancias</th>
                <th>CPU (max.)</th>
                <th>Memoria (max.)</th>
              </tr>";

        while($row = mysql_fetch_array($recursos)){
          echo "<tr>";
            echo "<td>".$row['maquina']."-".$row['instancias']."</td>";
            echo "<td>".$row['Cpu']." %</td>";
            echo "<td>".$row['Memoria']." %</td>";
          echo "</tr>";
        }

        echo "</table>"

      ?>
    </body>
  </html>
