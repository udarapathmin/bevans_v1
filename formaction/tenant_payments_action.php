<?php
include "../database.php";

//Get POST Data
	$propertyid = $_POST['propertyid']; 
	$agentid = $_POST['agentid'];
	$customerid = $_POST['customerid']; 
	
	$refno = $_POST['refno'];
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$month = $_POST['month'];


	$sql = "INSERT INTO  tenant_payments (propertyid, agentid, customerid, refno, date, amount, month) 
			VALUES ('$propertyid', '$agentid', '$customerid', '$refno', '$date', '$amount', '$month')";



	if ($conn->query($sql) === TRUE) {
		die(header("location:../tenantproperty.php?report=true&id=$propertyid"));
	} else {
		//Insert to table fail
		die(header("location:../tenantproperty.php?report=false&id=$propertyid"));
	}
?>