<?php

require 'php/user.php';

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Create a User</title>

  <link rel="icon" href="images/icon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/upload.css">
  <link rel="stylesheet" href="css/login.css">
  <!-- Front I use from Adobe -->
  <script src="https://use.typekit.net/efv3afb.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="linlout.js"></script>
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
    <form class="frm" method="POST" >
      <h1>Create A User</h1>
      <h3 id="validateTXT"></h3>
      <div class="hline">
      <div class="labl">

      <label>Username: </label>
      <label>Password: </label>
      <label>Repeat Password: </label>
      <label>Email: </label>

      </div>
      <div class="txt">
      <input type="text" name="userNME" id="userNME" placeholder="Username..."/>
      <input type="password" name="pswrd" id="pswrd" placeholder="Password..."/>
      <input type="password" name="pswrdR" id="pswrdR" placeholder="Repeat Password..."/>
      <input type="email" name="email" id="email" placeholder="Email..."/>
      </div>
      </div>
      <div class="sub">
        <input type="submit" name="insert" id="insert" value="Create User"/>
      </div>
    </form>

  </div>

 <script src="app.js"></script>
</body>

</html>

<script>

  $(document).ready(function(){

    $('#insert').click(function(){

      var userNme = $('#userNME').val();
      var pswrd = $('#pswrd').val();
      var pswrdR = $('#pswrdR').val();
      var email = $('#email').val();

      if(userNme == '' || pswrd == '' || pswrdR == '' || email == '')
      {
        document.getElementById('validateTXT').innerHTML = 'Please complete all fields!';

        setTimeout(function(){
          document.getElementById('validateTXT').innerHTML = '';
        }, 3000);

        return false;

      }
      else if(userNme.length < 4)
      {

        document.getElementById('validateTXT').innerHTML = 'Username must be at least 4 characters!';

        setTimeout(function(){
          document.getElementById('validateTXT').innerHTML = '';
        }, 3000);

        return false;

      }
      else if(pswrd != pswrdR)
      {

        document.getElementById('validateTXT').innerHTML = 'Passwords Do Not Match!';

        setTimeout(function(){
          document.getElementById('validateTXT').innerHTML = '';
        }, 3000);

        return false;

      }

    });

  });
  //nifty js to remove confirm form resubmission
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }

</script>
