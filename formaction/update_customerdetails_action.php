<?php
	include "../database.php";

	//Get POST Data
	$un= $_SESSION['username'];
	$email = $_POST['email']; 
	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname'];
	$othername =  $_POST['othername'];
	$addno = $_POST['addno'];
	$addstreet1 = $_POST['addstreet1'];
	$addstreet2 = $_POST['addstreet2'];
	$addsuburb = $_POST['addsuburb'];
	$addstate = $_POST['addstate'];
	$addpostcode = $_POST['addpostcode'];
	$phonemobile = $_POST['phonemobile'];
	$phonehome = $_POST['phonehome'];
	$phonefax = $_POST['phonefax'];


	//Update Admin Statement
	$sql = "UPDATE customer SET firstname='$firstname', othername='$othername', lastname='$firstname', email='$email', addno='$addno', addstreet1 = '$addstreet1', addstreet2 = '$addstreet2', addsuburb = '$addsuburb', addstate = '$addstate', addpostcode = '$addpostcode', phonemobile = '$phonemobile', phonehome = '$phonehome', phonefax = '$phonefax', iscomplete='1' WHERE username='$un' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../editcustomerprofile.php?edit=true"));

	} else {
		//Insert to users table fail
		die(header("location:../editcustomerprofile.php?edit=false"));
	}


?>