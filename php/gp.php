<?php

 require "php/dbCON.php";

 $pics="";

 if (!$con) {
   $pics = "<h2>Oops might be the internet or me!</h2>";
 }
 else
 {
   $pics = "<h2>Pictures</h2>";
 }

 $con->close();

 ?>
