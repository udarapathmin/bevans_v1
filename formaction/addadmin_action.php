<?php
	include "../database.php";

	//Get POST Data
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];  
	$email = $_POST['email']; 
	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname']; 


	//Check for Password Validation
	if($password != $cpassword){
		die(header("location:../addadmin.php?password=true"));
	}

	//check for valid username
	$bool = true;
	$sql="SELECT * FROM users WHERE username='$username'";
	$result = $conn->query($sql);
	if($result->num_rows ==1){
		$bool = false;
	}

	if(!$bool){
		die(header("location:../addadmin.php?username=true"));
	}


	//Validations true
	//Create User Account first
	$sqluseacc = "INSERT INTO users (username, password, first_name, last_name, user_type, email) 
					VALUES ('$username', '$password', '$firstname', '$lastname', 'A', '$email')";

	if ($conn->query($sqluseacc) === TRUE) {
		die(header("location:../addadmin.php?add=true"));

	} else {
		//Insert to users table fail
		die(header("location:../addadmin.php"));
	}


?>