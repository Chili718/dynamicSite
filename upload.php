<?php

$con = mysqli_connect("localhost", "root", "", "mysite") or die($con->connect_error);
$table = 'photoshopwork';

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

  $sql = "INSERT INTO $table (name, description, path) VALUES ('$picnim','$picdes','$imDir')";

  $con->query($sql) or die($con->error);

  mysql_close($con);

}

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
        <li><a href="login.php">Login</a></li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
  </div>

  <div class="upload">
    <h1>Upload Image</h1>

    <form class="frm" method="POST" enctype="multipart/form-data">
      <div class="hline">
      <div class="labl">
      <label for="imageNme" id="pad">Name: </label>
      <label for="imageDes">Description: </label>
      </div>
      <div class="txt">
      <input type="text" name="imageNme" id="imageNme" value="" placeholder="Enter the name..."/>
      <input type="text" name="imageDes" id="imageDes" value="" placeholder="Enter the description..."/>
      </div>
      </div>

    <div class="sub">
      <br /><br />
      <input type="file" name="image" id="image" value=""/>
      <!--
      <label for="image">Choose a file...</label>
      -->
      <br /><br />
      <input type="submit" name="insert" id="insert" value="Upload"/>
    </div>
    </form>

  </div>

 <script src="app.js"></script>
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
        alert("Please Select Image");
        return false;

      }
      else
      {
        var extension = $('#image').val().split('.').pop().toLowerCase();

        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
        {
          alert('Invalid Image File');
          $('#image').val('');
          return false;
        }
      }


    });

  });
</script>
