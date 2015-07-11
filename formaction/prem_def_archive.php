<?php
	include "../database.php";

	//Get POST Data
	$id = $_GET['id']; 
	$propertyid = $_GET['pid'];


	//Update Status Statement
	$sql = "UPDATE preliminary_defects SET status='1' WHERE id='$id' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../agentproperty.php?id=$propertyid"));

	} else {
		//Insert to users table fail
		die(header("location:../agentproperty.php?id=$propertyid"));
	}


?>