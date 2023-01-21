<?php 

$conn = mysqli_connect("localhost", "root", "", "lastproject");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data) {
	global $conn;

	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);
	$name=mysqli_real_escape_string($conn,$data["name"]);
    $number=mysqli_real_escape_string($conn,$data["phonenumber"]);
    $address=mysqli_real_escape_string($conn,$data["address"]);
    $city =mysqli_real_escape_string($conn,$data["city"]);
    $province = mysqli_real_escape_string($conn,$data["province"]);

	$result = mysqli_query($conn, "SELECT Email FROM userdata WHERE Email = '$email'");

	if(mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('Email already used')
				</script>";
			return false;
	}
	if( $password !== $password2 ) {
      echo "<script>
            alert('Confirmation password is incorrect');
         </script>";
      return false;
   }

   $password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn,"INSERT INTO userdata (Email,Password,Username,Number,Address,City,Province) VALUES ('$email','$password','$name','$number','$address', '$city', '$province')");

	return mysqli_affected_rows($conn);
}

function filldata($data, $email) {
   global $conn;

   $name=mysqli_real_escape_string($conn,$data["name"]);
   $number=mysqli_real_escape_string($conn,$data["phonenumber"]);
   $address=mysqli_real_escape_string($conn,$data["address"]);
   $city =mysqli_real_escape_string($conn,$data["city"]);
   $province = mysqli_real_escape_string($conn,$data["province"]);
   $email = $_SESSION["email"];

   $query = "UPDATE userdata SET Username = '$name', Number = '$number' , Address = '$address', City = '$city', Province ='$province' WHERE Email = $email";

  	mysqli_query($conn, $query);

  	echo mysqli_affected_rows($conn);
   return mysqli_affected_rows($conn);
}

function delete($data){
	global $conn;

	mysqli_query($conn, "DELETE FROM userdata WHERE Username = '$name'");
	return mysqli_affected_rows($conn);
}

 ?>