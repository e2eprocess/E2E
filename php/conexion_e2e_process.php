<?php

    include("login_e2e_process.php");
    $conexion = mysql_connect($db_hostname,$db_username,$db_password);

    if (!$conexion) {
      die('No se puede conectar a MySql: ' . mysql_error());
    }

    mysql_select_db($db_database, $conexion);

 ?>
