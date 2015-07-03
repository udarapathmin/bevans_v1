<?php
	include "../database.php";

	//Get POST Data
	$id = $_POST['id']; 
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];  

	//Check for Password Validation
	if($password != $cpassword){
		die(header("location:../editadmin.php?password=false&id=$id"));
	}

	//Validations true
	//Update Admin Statement
	$sql = "UPDATE users SET password='$password' WHERE id=$id ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../editadmin.php?edit=true&id=$id"));

	} else {
		//Insert to users table fail
		die(header("location:../editadmin.php?edit=false&id=$id"));
	}


?>