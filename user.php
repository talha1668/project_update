<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

$db = new dbClass();
$admin = new Admin();
$admin->checkSession($_SESSION);

// print_r($_SESSION);
// if(isset($_POST['sub']) && $_POST['sub']=="submit")
// {
// $id=$db->addStr($_POST['id']);
// $email=$db->addStr($_POST['email']);
// $password=$_POST['password'];

// }
// if(isset($_REQUEST['id'])){
//   $id = $_POST['id'];
//   $email = $db->addStr($_REQUEST['email']);
//   $pass = $db->addStr($_REQUEST['password']);

 

// }





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user details</title>

</head>

<style >


th, td {
  border: 1px solid black;
  padding: 15px;
  text-align: left;
}


th {
  background-color: #04AA6D;
  color: white;
}


  </style>


<body>



<table>
  <caption>User Details</caption>
  <thead>
    <tr>
    
      <th style ="width:10%;">S.no.</th>
      <th style ="width:70%;">Email</th>
      <th style ="width:50%; padding:5px 30px ;">Password</th>
      <th style ="width:50%; ">Ph. No.</th>
      <th style ="width:100%; padding:5px 30px ;">Address</th>
    <tr>
  </thead>

  <?php
$data = $admin->getAllCustomData("SELECT * FROM users");
// $id = $data['id'];
// $email = $data['email'];
// $pass = $data['password'];
$data_row = $admin->getCustomNumrowsCount("SELECT * FROM users");
// print_r($data);
if ($data_row == 0) {
  echo "<div class='alert alert-info'>
  Details is Not Added .
</div>";
} else { ?>
  <tbody>
    <?php
  foreach ($data as $user) {
    echo "<tr>
      <td>" . $user["id"] . "</td>
      <td>" . $user["email"] . "</td>
      <td>" . $user["password"] . "</td>
      <td>" . $user["mobile"] . "</td>
      <td>" . $user["address"] . "</td>
     
  
  
</tr>";
   }
  }
  ?>
</tbody>
 
  <!-- <tbody>
    <tr>
     
      <td>$820,180</td>
      <td>$841,640</td>
      <td>$732,270</td>
    </tr>
    <tr>
     
      <td>$850,730</td>
      <td>$892,580</td>
      <td>$801,240</td>
    </tr>
    <tr>
     
      <td>83%</td>
      <td>90%</td>
      <td>75%</td>
    </tr>
  </tbody>
</table>
... -->















</body>

</html>