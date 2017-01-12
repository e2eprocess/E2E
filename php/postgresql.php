<?php
  $db_con = pg_connect('host=15.17.162.173 port=5432 dbname=E2Ereporting user=e2e password=e2e')
    or die("No se puede conectar");
  echo "Conectado con exito";

  $query="Select * from \"E2E\".channel";

  $result = pg_query($db_con, $query);

  echo "Number of rows: " . pg_num_rows($result);

  pg_free_result($result);
  pg_close($db_con);

?>
