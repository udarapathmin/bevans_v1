<?php
	include "../database.php";

	//Get POST Data
	$id = $_POST['id']; 
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];  

	//Check for Password Validation
	if($password != $cpassword){
		die(header("location:../editcustomerprofile.php?password=false"));
	}

	//Validations true
	//Update Admin Statement
	$sql = "UPDATE users SET password='$password' WHERE username='$id' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../editcustomerprofile.php?edit=true"));

	} else {
		//Insert to users table fail
		die(header("location:../editcustomerprofile.php?edit=false"));
	}


?>