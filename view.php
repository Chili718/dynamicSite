<?php
session_start();
//print_r($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>View all PS Work</title>

  <link rel="icon" href="images/icon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/view.css">
  <link rel="stylesheet" href="css/lightbox.css">
  <!-- Front I use from Adobe -->
  <script src="https://use.typekit.net/efv3afb.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script src="linlout.js"></script>

  <script>

  //change opacity of the header background on scroll
  $(window).on("scroll", function(){

    if($(window).scrollTop() > 0){
      $(".navbar").addClass("nottransparent");
      $(".addU").addClass("nottransparent");
      $(".addIM").addClass("nottransparent");
    }else{
      $(".navbar").removeClass("nottransparent");
      $(".addU").removeClass("nottransparent");
      $(".addIM").removeClass("nottransparent");
    }

  });

  </script>

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
        <li><a href="index.php#home">Home</a></li>
        <li><a href="index.php#projects">Projects</a></li>
        <li><a href="index.php#photoshop">Photoshop Work</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="">Resume</a></li>
        <?php

          if(!isset($_SESSION['verified']) || $_SESSION['verified'] !== true)
          {

                echo "<li><a href='login.php'>Login</a></li>";

          }else{

                echo "<li><a href='#' onclick='logout()'>Logout</a></li>";
                echo "<script>activityWatcher()</script>";

          }

         ?>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
  </div>

  <?php

  if(isset($_SESSION['verified']))
  {

    echo "<div class='addU'><a href='user.php'><img src='images/addUICON.png'></a></div>";
    echo "<div class='addIM'><a href='upload.php'><img src='images/addIMICON.png'></a></div>";

  }

  ?>

  <h3 id="validateTXT"></h3>

  <div class="grid">
    <?php

      require "php/view.php";

     ?>
  </div>

  <div id="lightbox">
    <img id="closeBox" src="images/closeLightboxIcon.png">
    <?php

    if(isset($_SESSION['verified']))
    {

      echo "<img id='deleteBtn' src='images/deleteIcon.png' onclick='deleteIm()'>";


    }

    ?>
    <div id="viewPrevious"><img src="images/arrow.png"></div>
    <div id="viewNext"><img src="images/arrow.png"></div>
  </div>

  <script src="viewLightbox.js"></script>
 <script src="app.js"></script>
</body>

</html>
