<?php
   include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $password = md5($password);

      $sql = "SELECT id, name, email, phone, gender FROM user WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $user = new stdClass();

      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $user->name = $row['name'];
        $user->email = $row['email'];
        $user->phone = $row['phone'];
        $user->gender = $row['gender'];
      }

      $count = mysqli_num_rows($result);
      if($count == 1) {
        $user->status = "OK";
         echo json_encode($user);
      }else {
         $user->status = "ERROR";
         echo json_encode($user);
      }
   }
?>
