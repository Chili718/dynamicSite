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

if(isset($_POST['insert']))
{



}


?>
