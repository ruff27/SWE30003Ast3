<?php

if(!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.'index.php');
}

  $host = "feenix-mariadb.swin.edu.au";
  $user = "s103840173";
  $pwd = "270801";
  $sql_db = "s103840173_db";
?>