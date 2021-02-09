<?php

session_start();
//print_r($_SESSION);
if(!isset($_SESSION['verified']) || $_SESSION['verified'] !== true)
{
  header("Location: login.php");
  die();

}

require 'dbCON.php';

if (!$con) {
  echo '<script>alert("Could not connect to db, whoops!")</script>';
  die("<script>window.location = 'index.php';</script>");
}

//$table = 'photoshopwork';
$stmt = "";
$stmtB = "";
$close = "";

if(isset($_POST['insert']))
{
  //print_r($_FILES);
  //print_r($_POST);
  $picnim = $_POST['imageNme'];
  $picdes = $_POST['imageDes'];

  //echo $picnim;
  //echo $picdes;

  $imDir = 'photoshopWork/'.$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], $imDir);

  $sql = $con->prepare("INSERT INTO photoshopwork (name, description, path) VALUES (?, ?, ?)");

  $sql->bind_param("sss", $picnim, $picdes, $imDir);

  //"INSERT INTO $table (name, description, path) VALUES ('$picnim','$picdes','$imDir')";

  //$con->query($sql) or die($con->error);

  if($sql->execute())
  {

    $stmt = "<h2 id='change'>Image Uploaded Successfully!</h2>";
    $close = "<script>setTimeout(function(){document.getElementById('change').innerHTML = '';}, 3000);</script>";

  }
  else {

    $stmtB = "<h3 id='change'>Image Could Not Be Uploaded!</h3>";
    $close = "<script>setTimeout(function(){document.getElementById('change').innerHTML = '';}, 3000);</script>";

  }



  //mysql_close($con);
  $sql->close();
  $con->close();

}

 ?>
