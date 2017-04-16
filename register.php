<?php
include("config.php");

$user = new stdClass();
$user->name = $_POST['name'];
$user->email = $_POST['email'];
$user->gender = $_POST['gender'];
$user->phone = $_POST['phone'];
$password =  $_POST['password'];
$password = md5($password);

$response = new stdClass();
if(! $db ) {
    $response->status = "FAILED";
      echo json_encode($response);
      die('Could not connect: ' . mysql_error());
   }

  $regquery = "INSERT INTO user (name, phone, gender, email, password) VALUES('$user->name', '$user->phone', '$user->gender', '$user->email', '$password')";
  $regresult = mysqli_query($db, $regquery);
  if($regresult == 1){
    $user->status = "OK";
    echo json_encode($user);
  }
  else{
    $response->status = "ERROR";
    echo json_encode($response);
  }

 ?>
