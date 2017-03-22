<?php
  session_start();
if (!isset($_SESSION["fechaFromSeguimiento"])) {
  $from = date("d-m-Y", strtotime('-1 day'));
} elseif (empty($_POST['from'])) {
    $from = $_SESSION["fechaFromSeguimiento"];
} else {
    $from = $_POST['from'];
}

$_SESSION["fechaFromSeguimiento"]=$from;
?>
