
<?php
  session_start();

  require_once 'authentications.php';
  require_once 'config.php';
  require_once 'functions.php';
  $db = new dbClass();
  $admin = new Admin();
  $auth = new Authentication();
  if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $data = ["email" => $email, "password" => $password,"mobile" => $mobile, "address" => $address];
    // $stmt = $admin->getDataByUniqueColumn("users","email", $email);


      $insert = $admin->addData($data, "users");
      if ($insert) {
        echo "<script>alert('user resgitered');</script>";
        $auth->Login($email, $password);
        if ($auth) {
          echo "<script>window.location.href='index.php';</script>";
        }
      } else {
        echo "<script>alert('something went wrong!');</script>";
      }

    } 

      
    
    
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sign in</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add Font Awesome library -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css"> <script src="sc.js"></script></head>

<body>

 

	<div class="login">
		<h2 class="active"><a href="signup.php">Sign In</a></h2>
		<h2 class="nonactive"><a href="login.php">Login</a></h2>
		<form action="" enctype="multipart/form-data" method="post" onsubmit="return validation()">
			<input type="text" class="text" name="email" id="email">
			<span>Email</span><br>
			<span id="em_err"></span><br>

			<input type="password" class="text" name="password" id="password">
			<span>Password</span><br>
			<span id="pw_err"></span><br>

			<input type="text" class="text" name="mobile" id="mobile">
			<span>Phone Number</span><br>
			<span id="pn_err"></span><br>

			<textarea class="text" name="address" id="address"></textarea>
			<span>Address</span><br>
			<span id="ad_err"></span><br>

			<input type="checkbox" id="checkbox-1-1" class="custom-checkbox" name="remember_me" />
			<label for="checkbox-1-1">Keep me signed in</label><br>

			<button class="sign_in" type="submit">
				Sign In
			</button>
			<hr>
			<a href="#">Forgot Password?</a>
		</form>
	</div>

	<script>
		function validation() {
			var email = document.getElementById("email").value;
			var password = document.getElementById("password").value;
			var mobile = document.getElementById("mobile").value;
			var address = document.getElementById("address").value;

			var em_err = document.getElementById("em_err");
			var pw_err = document.getElementById("pw_err");
			var pn_err = document.getElementById("pn_err");
			var ad_err = document.getElementById("ad_err");

			var email_regex = /^\S+@\S+\.\S+$/;

			if (email == "") {
				em_err.innerHTML = "Please enter your email";
				em_err.style.color = "red";
				return false;
			} else if (!email_regex.test(email)) {
				em_err.innerHTML = "Please enter a valid email address";
				em_err.style.color = "white";
				return false;
			} else {
				em_err.innerHTML = "";
			}

			if (password == "") {
				pw_err.innerHTML = "Please enter your password";
				pw_err.style.color = "red";
				return false;
			} else {
				pw_err.innerHTML = "";
			}

			if (mobile == "") {
				pn_err.innerHTML = "Please enter your phone number";
				pn_err.style.color = "red";
				return false;
			} else {
				pn_err.innerHTML = "";
			}

			if (address == "") {
				ad_err.innerHTML = "Please enter your address";
				ad_err.style.color = "red";
				return false;
			} else {
				ad_err.innerHTML = "";
			}

			return true;
		}
	</script>
</body>
</html>