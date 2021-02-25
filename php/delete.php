<?php
  session_start();
  //connect to database
  require 'dbCON.php';

  if (!$con) {
    echo 'DBF';
    die();
  }

  $msg = "";

  
  $con->close();

 ?>
