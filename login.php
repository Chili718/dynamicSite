<?php
session_start();

$ver = "";
$dbf = "";
$close = "";
//print_r($_SESSION);
if(isset($_SESSION['verified']))
{
  header("Location: index.php");
  die();

}else if(isset($_GET['vkey'])){

  require 'php/verify.php';

}

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <link rel="icon" href="images/icon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/upload.css">
  <link rel="stylesheet" href="css/login.css">
  <!-- Front I use from Adobe -->
  <script src="https://use.typekit.net/efv3afb.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script src="js/linlout.js"></script>

</head>

<body>

  <div class="preloader">

    <img class="ship" src="images/ship.gif">

    <div class="loadStuff">

      <img class="" src="images/Loading.gif">
      <img class="" src="images/Circle.gif">

    </div>

  </div>

  <div class="navbar">
      <a class="miglink" href="index.php#home"><img class="navbar-image" src="images/logo.png"></a>
      <ul class="nav-links" id="check">
        <li><a href="index.php#projects">Projects</a></li>
        <li><a href="index.php#photoshop">Photoshop Work</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="downloads/Resume.pdf" download="JonTiceResume">Resume</a></li>
        <?php

          if(!isset($_SESSION['verified']) || $_SESSION['verified'] !== true)
          {

                echo "<li><a href='login.php'>Login</a></li>";

          }else{

                echo "<li><a href='#' onclick='logout()'>Logout</a></li>";

          }

         ?>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
  </div>

  <div class="login">
    <!--
    Handle the form submission vis JS when hitting enter "submitting the form"
    another way than clicking the button
    -->
    <form class="frm" onsubmit="login(); return false">
      <h1>Login</h1>
      <h3 id="validateTXT"><?php echo $dbf; ?></h3>
      <h3 id='ver'><?php echo $ver; echo $close; ?></h3>
      <div class="hline">
      <div class="labl">
      <label id="pad">Username: </label>
      <label>Password: </label>
      </div>
      <div class="txt">
      <input type="text" name="userNME" placeholder="Username..."/>
      <input type="password" name="pswrd" placeholder="Password..."/>
      </div>
      </div>
      <div class="sub">

        <div onclick="login()" class="btn">Login</div>
        <input type= "submit" style="display: none">
      </div>
    </form>

  </div>

 <script src="js/app.js"></script>
</body>

</html>
