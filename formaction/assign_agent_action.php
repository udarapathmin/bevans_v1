<?php
	include "../database.php";

	//Get POST Data
	$agentid = $_POST['agentid']; 
	$propertyid = $_POST['propertyid'];


	//Update property Statement
	$sql = "UPDATE realestateproperty SET agentid='$agentid' WHERE propertyid='$propertyid' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../viewproperty.php?assign=true&id=$propertyid"));

	} else {
		//update to propety table fail
		die(header("location:../viewproperty.php?assign=false&id=$propertyid"));
	}


?>