<?php
  $dsn = "NZSQL";
  //debe ser de sistema no de usuario
  $usuario ="xe27219";
  $clave="yX5CPcdi";
  $db_con = odbc_connect($dsn,$usuario,$clave);
  if (!$db_con){
	   exit("<strong>Ya ocurrido un error tratando de conectarse con el origen de datos.</strong>");
  }
?>
