<?php
	include "../database.php";


	$type = $_GET['t']; 
	$id = $_GET['id'];
	$propertyid = $_GET['pid'];

	if($type == 'A'){
		$status = '1';
		$message = "accept";
	}
	if($type == 'R'){
		$status = '2';
		$message = "reject";
	}

	//Update Admin Statement
	$sql = "UPDATE tenant_payments SET status='$status' WHERE id='$id' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../agentproperty.php?payment=$message&id=$propertyid"));

	} else {
		//Insert to users table fail
		die(header("location:../agentproperty.php?payment=$message&id=$propertyid"));
	}


?>