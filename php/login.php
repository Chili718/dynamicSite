<?php
  session_start();
  //connect to database
  require 'dbCON.php';

  if (!$con) {
    echo 'DBF';
    die();
  }
  //$con = mysqli_connect("localhost", "rooot", "", "mysite") or die($con->connect_error);
  //search for Username
  $stmt = $con->prepare("SELECT * FROM users WHERE username=? AND password=PASSWORD(?) LIMIT 1");
  $stmt->bind_param("ss", $_POST['userNME'], $_POST['pswrd']);

  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows === 1){

    $_SESSION['verified'] = true;
    echo "true";

  }else {
    echo "false";
  }

  $stmt->close();
  $con->close();

 ?>
