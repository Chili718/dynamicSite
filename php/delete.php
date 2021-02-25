<?php
  session_start();
  //connect to database
  require 'dbCON.php';

  if (!$con) {
    echo 'Could not Connect to DB';
    die();
  }

  if(isset($_POST['path'])){

    $sql = $con->prepare("DELETE FROM photoshopwork WHERE path = ?");
    $sql->bind_param("s", $_POST['path']);

    $sql->execute();

    if($sql->affected_rows >= 1)
    {
      $rem = "../".$_POST['path'];

      if(!unlink($rem)){
        echo "Could not remove file from local system...";
      }
      else {
        echo "Successful Delete!";
      }


    }
    else {
      echo "Could not be Deleted From DB";
    }

  }

  $sql->close();
  $con->close();

 ?>
