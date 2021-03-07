<?php

require 'dbCON.php';

if (!$con) {
  echo "<h2 class='err'>Oops might be the internet or me!</h2>";
}
else
{

  if(isset($_POST['count']))
  {
    $table  = "photoshopwork";
    $result = $con->query("SELECT count(*) as allCount FROM $table");
    $row = $result->fetch_assoc();

    //if all of the images have not been displayed
    if($row["allCount"] > $_POST["count"] && $_POST["count"] != 0){

      $stmt = $con->prepare("SELECT * FROM $table ORDER BY id LIMIT ?, 10");
      $stmt->bind_param("s", $_POST['count']);
      $stmt->execute();
      $result = $stmt->get_result();

      echo printHtml($result);
    }

  }

  $con->close();

}

function printHtml($result){
   $htmlR = "";

  if (mysqli_num_rows($result)!=0) {

    while($data = $result->fetch_assoc()){

      //print_r($data);

      $htmlR .= "<div><h2>".$data["name"]."</h2><img class='psW' src = ".$data["path"]."></div>";
      //echo "<div><img src = ".$data["path"]."><h2>".$data["name"]."</h2></div>";
    }

  }else{

    $htmlR .= "<h2 class='err'>Looks like there are no images!</h2>";

  }

  return $htmlR;

}

 ?>
