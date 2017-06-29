<?php

  $diaSemana = date("w");

  if ($diaSemana == 0 || $diaSemana == 7){
    if ($diaSemana == 0){
      $now = date("Y-m-d");
      $now = strtotime('-2 day', strtotime($now));
      $now = date("Y-m-d", $now);
    }else{
      $now = date("Y-m-d");
      $now = strtotime('-1 day', strtotime($now));
      $now = date("Y-m-d", $now);
    }
    $yesterday = strtotime('-1 day', strtotime($now));
    $yesterday = date("Y-m-d", $yesterday);
  }else{
    if ($diaSemana == 1){
      $now = date("Y-m-d");
      $yesterday = strtotime('-3 day', strtotime($now));
      $yesterday = date("Y-m-d", $yesterday);
    }else{
      $now = date("Y-m-d");
      $yesterday = strtotime('-1 day', strtotime($now));
      $yesterday = date("Y-m-d", $yesterday);
    }
  }

  $from = strtotime('-7 day', strtotime($yesterday));
  $from = date("Y-m-d", $from);
  $to = strtotime('-7 day', strtotime($now));
  $to = date("Y-m-d", $to);


?>
