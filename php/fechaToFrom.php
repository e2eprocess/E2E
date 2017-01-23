<?php
  session_start();

if (!isset($_SESSION["fechaToNet"])) {
  $to = date("d-m-Y", strtotime('-1 hour'));
  $from = date("d-m-Y", strtotime('-169 hour'));
} elseif (empty($_POST['to'])) {
    $to = $_SESSION["fechaToNet"];
    $from = $_SESSION["fechaFromNet"];
} else {
    $to = $_POST['to'];
    $from = $_POST['from'];
}

  $_SESSION["fechaToNet"]=$to;
  $_SESSION["fechaFromNet"]=$from;
?>
