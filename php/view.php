<?php

require 'dbCON.php';

$pics="";

if (!$con) {
  $pics = "<h2>Oops might be the internet or me!</h2>";
}
else
{

  $table  = "photoshopwork";
  $result = $con->query("SELECT * FROM $table");

  while($data = $result->fetch_assoc()){

    //print_r($data);

    echo "<div><h2>".$data["name"]."</h2><img src = ".$data["path"]."></div>";
    //echo "<div><img src = ".$data["path"]."><h2>".$data["name"]."</h2></div>";
  }

}

$con->close();


 ?>
