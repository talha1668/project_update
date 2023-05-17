<?php

session_start();

require_once 'authentications.php';
require_once 'config.php';
require_once 'functions.php';
$db = new dbClass();
$admin = new Admin();
$auth = new Authentication();

// $auth->SignOut();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone</title>
   <style>
.container{
    background-image: url(images/DRN.jpeg);
  
   background-position: -158px;
    background-size: cover;
    
    background-repeat: no-repeat;
    border: 2px solid black;
    height: 100vh;
   
    display: flex;
    justify-content: center;
    align-items: center;
}

.si{
  
   
   padding-top: 20px;
  
  text-decoration: none;
  color: rgb(0, 0, 0);
  padding:8px 25px;
  border-radius: 50px;
  border: none;
  background-color: rgb(255, 253, 253);
  display: flex;
  justify-content: center;
  align-items: center;
}


h1{
    
    color: white;

   font-size: 72px;
  
}





   </style>
</head>

<body>




<div class="container">
    <ul><h1 style="position: absolute;
  
    padding-left: 11px;
    color: #fffff1ad;
    padding-top: 7px;">WELCOME!</h1>
    <h1>WELCOME!</h1>

<a class="si" href="login.php">SIGN IN</a></ul>
</div>
</body>
</html>