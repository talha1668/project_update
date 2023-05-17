<?php

session_start();

require_once 'authentications.php';
require_once 'config.php';
require_once 'functions.php';
$db = new dbClass();
$admin = new Admin();
$auth = new Authentication();
if(isset($_POST["email"])){
    
    $email = $_POST["email"];
    $password = $_POST["password"];
   $user_admin = $admin->getDataBy2UniqueColumn("admin", "email" ,$email, "password", $password );

    
    if($user_admin){
    echo "<script>window.location.href='user.php';</script>";

    }else{
        echo "<script>alert('password incorect');</script>";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 40%;

      /* font-family: Arial, Helvetica, sans-serif; */
      /* margin: 0px 15px; */
      border: 3px solid #5161ce;
      border-radius: 14px;
    }

    /* .container{
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
} */
    form {
      border: 3px solid #5161ce;

      margin: 0px;
      border-radius: 11px;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    input[type=email],
    input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #5161ce;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #5161ce;
    }



    .container {
      padding: 16px;
    }

    span.password {
      float: right;
      padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.password {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="container">


    <h2 style="margin: 22px;">Login Form</h2>

    <form action="" enctype="multipart/form-data" method="post">


      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email ID" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>


    </form>
  </div>

</body>

</html>