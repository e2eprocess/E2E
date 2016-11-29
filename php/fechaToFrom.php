<?php
  session_start();
  if (empty($_POST['to'])){
    $to = date("d-m-Y", strtotime('-1 hour'));
  } else {
      $to = $_POST['to'];
  }
  if (empty($_POST['from'])){
    $from = date("d-m-Y", strtotime('-169 hour'));
  } else {
      $from = $_POST['from'];
  }

  $_SESSION["fechaToNet"]=$to;
  $_SESSION["fechaFromNet"]=$from;
?>
