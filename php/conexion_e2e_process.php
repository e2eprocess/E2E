<?php
/*
  //Acceso Mysql
  include("login_e2e_process.php");
  $conexion = mysql_connect($db_hostname,$db_username,$db_password);

  if (!$conexion) {
    die('No se puede conectar a MySql: ' . mysql_error());
  }

  mysql_select_db($db_database, $conexion);
*/
  //Acceso PostgreSql
  /*$db_con = pg_connect('host=15.17.162.173 port=5432 dbname=E2Ereporting user=e2e password=e2e')
    or die("No se puede conectar");*/
  $db_con = pg_connect('host=23.1.12.88 port=5432 dbname=E2Ereporting user=postgres password=misco444')
    or die("No se puede conectar");

 ?>
