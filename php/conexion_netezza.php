<?php
  $dsn = "NZSQL";
  //debe ser de sistema no de usuario
  $usuario ="xe27219";
  $clave="yX5CPcdi";
  $db_con_net = odbc_connect($dsn,$usuario,$clave);
  if (!$db_con_net){
	   exit("<strong>Ha ocurrido un error tratando de conectarse con el origen de datos.</strong>");
  }
?>
