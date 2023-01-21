<?php 
session_start();
require 'conn.php';

if (isset($_SESSION['login'])) {
    header('Location: mainpage.php');
    exit;
}

	if( isset($_POST["register"]) ){

		if( registrasi($_POST ) > 0 ){
			echo "<script>
					alert('New user has been registered');
					</script>";
			$_SESSION["login"] = true;

        	header("Location: loginuser.php");
        	exit;
		}else {
			echo mysqli_error($conn);
		}
		
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/styleregister.css">

</head>
<body>

	<div class="container">
		<form class="box" action="" method="post">
			<h1>Register</h1>
			<div class="flex-row">
				<div class="flex">
					<div class="input-container">
						<label for="name">Email</label>
						<input type="email" name="email" placeholder="E-mail" required>
					</div>

					<div class="input-container">
		                <label for="name">Name</label>
		                <input type="text" name="name" id="name" placeholder="Username" required>
		            </div>

		            <div class="input-container">
		            	<label for="password">Password</label>
						<input type="password" name="password" placeholder="Password" required>
					</div>

					<div class="input-container">
						<label for="name">Confirm Password</label>
						<input type="password" name="password2" placeholder="Confirm Password" required>
					</div>
				</div>
				<div class="flex">
		            <div class="input-container">
		                <label for="phonenumber">Phone Number</label>
		                <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" required>
		            </div>

		            <div class="input-container">
		                <label for="address">Address</label>
		                <input type="text" name="address" id="address" placeholder="Address" required>
		            </div>

		            <div class="input-container">
		                <label for="city">City</label>
		                <input type="text" name="city" id="city" placeholder="City" required>
		            </div>

		            <div class="input-container">
		                <label for="province">Province</label>
		                <input type="text" name="province" id="province" placeholder="Province" required>
		            </div>
		        </div>
			</div>
			<input type="submit" name="register" value="Register">
		</form>
	</div>

</body>
</html>