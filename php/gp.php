<?php

 require "dbCON.php";

 $pics="";

 if (!$con) {
   $pics = "<h2>Oops might be the internet or me!</h2>";
 }
 else
 {

   $table  = "photoshopwork";
   $result = $con->query("SELECT * FROM $table ORDER BY RAND() LIMIT 9");

   while($data = $result->fetch_assoc()){

     //print_r($data);

     echo "<div class = 'carousel_cell'><img src = '{$data['path']}' class='cil'></div>";

   }

 }

 $con->close();

 ?>
