<?php
	include "../database.php";

	//Get POST Data
	$propertytypename = $_POST['propertytypename']; 
	$description = $_POST['description'];

	//Create User Account first
	$sql = "INSERT INTO propertytype (propertytypename, description) 
					VALUES ('$propertytypename', '$description')";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../addpropertytype.php?add=true"));

	} else {
		//Insert to users table fail
		die(header("location:../addpropertytype.php?add=false"));
	}


?>