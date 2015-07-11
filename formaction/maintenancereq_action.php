<?php
include "../database.php";

//Get POST Data
	$propertyid = $_POST['propertyid']; 
	$agentid = $_POST['agentid'];
	$customerid = $_POST['customerid']; 

	$details = $_POST['details'];
	$keyaccess = $_POST['keyaccess'];
	$specialnotes = $_POST['specialnotes'];

	$typedata ="";
	if(isset($_POST['type'])){
		$interiorfeatures = $_POST['type'];
		//Create string for types
		foreach ($interiorfeatures as $fc){
			$typedata = $typedata . $fc . ", ";
		} 
	}

	$sql = "INSERT INTO  maintenance_requests (propertyid, agentid, customerid, type, details, keyaccess, specialnotes) 
					VALUES ('$propertyid', '$agentid', '$customerid', '$typedata', '$details', '$keyaccess', '$specialnotes')";



	if ($conn->query($sql) === TRUE) {
		die(header("location:../tenantproperty.php?report=true&id=$propertyid"));
	} else {
		//Insert to table fail
		die(header("location:../tenantproperty.php?report=false&id=$propertyid"));
	}
?>