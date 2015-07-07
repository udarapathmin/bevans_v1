<?php
	include "../database.php";

	//Get POST Data
	$propertyid = $_POST['propertyid']; 
	$cutomerid = $_POST['customerid'];
	$agentid = $_POST['agentid'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//Create User Account first
	$sql = "INSERT INTO customer_askmore (propertyid, agentid, cutomerid, subject, message) 
					VALUES ('$propertyid', '$agentid', '$cutomerid', '$subject', '$message')";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../askmore.php?message=true&id=$propertyid"));

	} else {
		//Insert to users table fail
		die(header("location:../askmore.php?message=false&id=$propertyid"));
	}


?>