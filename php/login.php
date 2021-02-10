<?php
  session_start();
  //connect to database
  require 'dbCON.php';

  if (!$con) {
    echo 'DBF';
    die();
  }

  $msg = "";

  //search for Username
  //not limiting the query because the username and email are unique
  $stmt = $con->prepare("SELECT password, salt, verified FROM userst WHERE username=? OR email=?");
  $stmt->bind_param("ss", $_POST['userNME'], $_POST['userNME']);

  $stmt->execute();
  $result = $stmt->get_result();

  if($result != false){

    $usr = $result->fetch_assoc();

    $pep = "%^%";
    $p = $usr['password'];
    $slt = $usr['salt'];


    if (password_verify($pep.$_POST['pswrd'].$pep.$slt, $p)) {
      $_SESSION['verified'] = true;
      echo "true";
    }else{

      echo "false";

    }

  }else {
    echo "false";
  }

  $stmt->close();
  $con->close();

 ?>
