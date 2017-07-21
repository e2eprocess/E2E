<?php
  session_start();
if (!isset($_SESSION["fechaFromSeguimiento"])) {
  $from = date("d-m-Y", strtotime('-1 day'));
} elseif (empty($_POST['from']) && empty($_GET["dia"])) {
    $from = $_SESSION["fechaFromSeguimiento"];
} elseif (empty($_POST['from'])) {
    $from = $_GET["dia"];
}
  else {
		$from = $_POST['from'];
	}

$_SESSION["fechaFromSeguimiento"]=$from;
?>
