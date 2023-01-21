<?php 
session_start();
require 'conn.php';

if( isset($_SESSION["login"]) ){
	header("Location: mainpage.php");
	exit;
}

if( isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM userdata WHERE Username = '$username' ");
	if(mysqli_num_rows($result) === 1){

		$row = mysqli_fetch_assoc($result);

		if( password_verify( $password, $row["Password"])) {

			$_SESSION["login"] = true;

			header("Location: mainpage.php");
			exit;
		}

	}

	$error = true;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">

</head>
<body>

	<form class="box" action="" method="post">

		<h1>Login</h1>
		<?php if( isset($error) ) :?>
			<p> Username / Password Incorrect </p>
		<?php endif; ?>
		<input type="text" name="username" placeholder="username" id="username">
		<input type="password" name="password" placeholder="password" id="password">
		<input type="submit" name="login" value="Login">
		<label>You dont have any account ?</label><br>
		<a href="register.php">Register Now</a>
	</form>

</body>
</html>