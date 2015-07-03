<?php
	include "../database.php";

	//Get POST Data
	$id = $_POST['id']; 
	$username = $_POST['username']; 
	$email = $_POST['email']; 
	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname']; 

	//Update Admin Statement
	$sql = "UPDATE users SET first_name='$lastname', last_name='$firstname', email='$email' WHERE id=$id ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../editadmin.php?edit=true&id=$id"));

	} else {
		//Insert to users table fail
		die(header("location:../editadmin.php?edit=false&id=$id"));
	}


?>