<?php

 require "dbCON.php";


 if (!$con) {
   echo "<h2>Oops might be the internet or me!</h2>";
 }
 else
 {

   $table  = "photoshopwork";
   $result = $con->query("SELECT * FROM $table ORDER BY RAND() LIMIT 9");

   if (mysqli_num_rows($result)!=0) {

     while($data = $result->fetch_assoc()){

       //print_r($data);
       $minPath = substr_replace($data['path'], "Min", strripos($data['path'],"."),0);

       $minPath = substr_replace($minPath, "/min", strripos($minPath,"/"),0);

       echo "<div class = 'carousel_cell'><img src = '{$minPath}' class='cil'></div>";

     }

   }else{

     echo "<h2>Looks like there are no images!</h2>";

   }

   $con->close();

 }

 ?>
