<?php
	include "../database.php";

	//Get POST Data
	$featuretype = $_POST['featuretype']; 
	$featurename = $_POST['featurename'];
	$description = $_POST['description'];

	//Create User Account first
	$sql = "INSERT INTO features (featuretype, featurename, description) 
					VALUES ('$featuretype', '$featurename', '$description')";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../addfeature.php?add=true"));

	} else {
		//Insert to users table fail
		die(header("location:../addfeature.php?add=false"));
	}


?>