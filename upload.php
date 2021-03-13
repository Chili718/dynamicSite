<?php

  require 'php/upload.php';

 ?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Upload Photoshop Work</title>

  <link rel="icon" href="images/icon.ico">
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/upload.css">
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
        <li><a href="view.php">Photoshop Work</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="">Resume</a></li>
        <?php

          if(!isset($_SESSION['verified']) || $_SESSION['verified'] != 1)
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

  }

  ?>

  <div class="upload">

    <form class="frm" method="POST" enctype="multipart/form-data">
      <h1>Upload Image</h1>
      <h3 id="validateTXT"></h3>

      <?php
        echo $stmtB
      ?>

      <div class="hline">
      <div class="labl">
      <label for="imageNme" >Name: </label>
      <label for="imageDes">Description: </label>
      </div>
      <div class="txt">
      <input type="text" name="imageNme" id="imageNme" placeholder="Enter the name..."/>
      <input type="text" name="imageDes" id="imageDes" placeholder="Enter the description..."/>
      </div>
      </div>

    <div class="sub">
      <input type="file" name="image" id="image" value=""/>
      <!--
      <label for="image">Choose a file...</label>
      -->
      <br/>

      <?php
            echo $stmt;
            echo $close;
      ?>

      <input type="submit" name="insert" id="insert" value="Upload"/>
    </div>
    </form>

  </div>

 <script src="js/app.js"></script>
</body>

</html>

<script>

  $(document).ready(function(){

    $('#insert').click(function(){

      var image = $('#image').val();
      var image_name = $('#imageNme').val();
      var image_des = $('#imageDes').val();

      if(image_name == '' || image == '' || image_des == '')
      {
        document.getElementById('validateTXT').innerHTML = 'Please complete all fields!';

        setTimeout(function(){
          document.getElementById('validateTXT').innerHTML = '';
        }, 3000);

        return false;

      }
      else
      {
        var extension = $('#image').val().split('.').pop().toLowerCase();

        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
        {
          document.getElementById('validateTXT').innerHTML = 'Invalid File Type!';

          setTimeout(function(){
            document.getElementById('validateTXT').innerHTML = '';
          }, 3000);

          $('#image').val('');
          return false;
        }
      }

    });

  });
  //nifty js to remove confirm form resubmission
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }

</script>
