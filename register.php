<?php
include("config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$password =  $_POST['password'];

if(! $db ) {
      echo "FAILED";
      die('Could not connect: ' . mysql_error());
   }

  //  $stmt = $mysqli->prepare('INSERT INTO user (name, phone, gender, email, password) VALUES ( ?, ?, ?, ?, ? )');
   //
  //  $stmt->bind_param("sisss", $name, $phone, $gender, $email, $password);
  //  $stmt->execute();
  //  $stmt->close();
  $regquery = "INSERT INTO user (name, phone, gender, email, password) VALUES('$name', '$phone', '$gender', '$email', '$password')";
  $regresult = mysqli_query($db, $regquery);
  if($regresult == 1){
    echo "SUCCESS";
  }
  else{
    echo "FAILED";
  }

 ?>
