<?php
	include "../database.php";

	//Get POST Data
	$un= $_SESSION['username'];
	$email = $_POST['email']; 
	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname'];
	$othername =  $_POST['othername'];
	$gender =  $_POST['gender'];
	$phonemobile = $_POST['phonemobile'];
	$phonework = $_POST['phonework'];
	$phonefax = $_POST['phonefax'];
	$dob = $_POST['dob'];


	//Update Admin Statement
	$sql = "UPDATE agent SET firstname='$firstname', othername='$othername', lastname='$lastname', email='$email', gender = '$gender', phonemobile = '$phonemobile', phonework = '$phonework', phonefax = '$phonefax', dob = '$dob', iscomplete='1' WHERE username='$un' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../editagent.php?edit=true"));

	} else {
		//Insert to users table fail
		die(header("location:../editagent.php?edit=false"));
	}


?>