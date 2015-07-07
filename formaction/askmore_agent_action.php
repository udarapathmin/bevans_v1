<?php
	include "../database.php";

	//Get POST Data
	$id = $_POST['messageid']; 
	$reply = $_POST['reply'];

	//Create User Account first
	$sql = "UPDATE customer_askmore SET reply='$reply', status='1' WHERE id=$id ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../askedmore.php?message=true"));

	} else {
		//Insert to users table fail
		die(header("location:../askedmore.php?message=false"));
	}


?>