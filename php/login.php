<?php
  session_start();
  //connect to database
  require 'dbCON.php';

  if (!$con) {
    echo 'DBF';
    die();
  }
  else if (isset($_POST['userNME']) && !empty($_POST['pswrd']))
  {
    $msg = "";

    //search for Username
    //not limiting the query because the username and email are unique
    $stmt = $con->prepare("SELECT password, salt, verified FROM userst WHERE username=? OR email=? LIMIT 1");
    $stmt->bind_param("ss", $_POST['userNME'], $_POST['userNME']);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){

      $usr = $result->fetch_assoc();

      if($usr['verified'] == 1){

        $pep = "%^%";
        $p = $usr['password'];
        $slt = $usr['salt'];


        if (password_verify($pep.$_POST['pswrd'].$pep.$slt, $p)) {
          $_SESSION['verified'] = true;
          echo "true";
        }else{

          echo "false";

        }

      }else{

        echo "notVer";

      }

    }else {
      echo "false";
    }

    $stmt->close();
    $con->close();
  }
  else
  {
    echo "false";
  }

 ?>
