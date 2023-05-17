<?php
session_start();

require_once 'authentications.php';
require_once 'config.php';
require_once 'functions.php';
$db = new dbClass();
$admin = new Admin();
$auth = new Authentication();
if (isset($_POST["email"]) && isset($_POST["password"])) { // check if email and password are set in POST request

  $email = $db->addStr($_POST["email"]);
  $password = $db->addStr($_POST["password"]);
  $result = $auth->Login($email, $password);
  if ($result == true) {
    if (empty($_POST["email"])) { // check if email is empty
      echo "Please enter your email";
    } else if (empty($_POST["password"])) { // check if password is empty
      echo "Please enter your password";
    } else {
      echo "<script>window.location.href='index.php';</script>"; // redirect to index.php
    }
  } else {
    echo "<script>alert('Incorrect email or password');</script>"; // display error message for incorrect email or password
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add Font Awesome library -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css"> <script src="sc.js"></script></head>

<body>


<div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <!-- <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Stackfindover</a></h1> -->
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Log in</span>
              <form id="myForm" action="" enctype="multipart/form-data" method="post">
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                   
                  </div>
                  <input type="password" name="password">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Keep Login
                  </label>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                </div>
                <div class="field">
                  <a class="ssolink" href="#">Forgot Password</a>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="signup.php">Sign up</a></span>
           
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <div class="login">
    <h2 class="active"><a href="login.php">login </a></h2>

    <h2 class="nonactive"><a href="signup.php"> signin </a> </h2>
    <form id="myForm" action="" method="post">



      <label for="email">EMAIL</label>
      <input type="text" class="text" name="email" id="email">

      <div id="em_err" style="    margin: -29px 20px; position: absolute;"></div>




      <label for="password">PASSWORD</label>
      <input type="password" class="text" name="password" id="password">


      <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
      <label for="checkbox-1-1">Keep me log in</label>

      <button class="log_in" name="submit" type="submit">
        Log In
      </button>


      <hr>

      <a href="#">Forgot Password?</a>
    </form>

  </div>
   -->
  <script>
    // get the form element
    const form = document.getElementById("myForm");

    // add event listener to form submit event
    form.addEventListener("submit", function(event) {
      // prevent the form from submitting
      // event.preventDefault();

      // get the input fields
      // const nameInput = document.getElementById("name");
      const emailInput = document.getElementById("email");
      const passwordInput = document.getElementById("password");

      const em_err = document.getElementById("em_err");
      const pw_err = document.getElementById("pw_err");


      // check if the input values are valid

      const email_regex = /^\S+@\S+\.\S+$/;
      if (emailInput.validity.typeMismatch || emailInput.value === "") {
        em_err.innerHTML = "Please enter your email";
        em_err.style.color = "red";
        return false;
      }
      // else if (!email_regex.test(email)) {
      //   em_err.innerHTML = "Please enter a valid email address";
      //   em_err.style.color = "white";
      //   return false;
      // } 
      else {
        em_err.innerHTML = "";
      }


      if (passwordInput.value === "") {
        pw_err.innerHTML = "Please enter your password";
        pw_err.style.color = "red";
        return false;
      } else {
        pw_err.innerHTML = "";
      }


      return true;
    });


    // if all input values are valid, submit the form
  </script>
</body>

</html>