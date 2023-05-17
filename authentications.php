<?php

class Authentication
{

	private $email;
	private $pass;
	private $conn;
	public function Login($email, $pass)
	{

		$conn = new dbClass();
		$this->conn = $conn;
		$this->$email =$email;
		$this->pass = $pass;

		$result = $conn->getData("SELECT * FROM `users` WHERE `email`='$email' AND `password` = '$pass' ");
		$time = time();
		if ($result != '') {

			

			$_SESSION['userid'] = $result["id"];
			$_SESSION['email'] = $result["email"];
			//echo "<script>alert('".$_SESSION['user_id']."')</script>";

			return true;
		} else {
			return false;
		}
	}

	

	public function SignOut()
	{
		unset($_SESSION['userid']);
		unset($_SESSION['email']);
		session_destroy();
		echo "<script>window.location.href='login.php'</script>";
	}
}


