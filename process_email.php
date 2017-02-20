<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = mysqli_real_escape_string($db,$_POST['email']);

      $sql = "SELECT id FROM user WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
      if($count == 1) {
         echo "true";
      }else {
         echo "false";
      }
   }
?>
