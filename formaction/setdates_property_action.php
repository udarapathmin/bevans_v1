<?php
	include "../database.php";

	//Get POST Data
	$propertyid = $_POST['propertyid']; 
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];  

	$date1=date_create($startdate);
  	$date2=date_create($startdate);

  	$today=date_create(date('Y-m-d'));

  	//Date1
	$diff1=date_diff($today,$date1);

	//Date2
	$diff2=date_diff($today,$date2);

	//Start date and End DAte compare
	$diff3=date_diff($date1,$date2);

	if($diff1->format("%R%") != '+' ||  $diff1->format("%a") == '0' || $diff2->format("%R%") != '+' ||  $diff2->format("%a") == '0'|| $diff3->format("%R%") != '+' ){ 
		die(header("location:../agentproperty.php?dates=false&id=$propertyid"));
	}


	//Update Property
	$sql = "UPDATE realestateproperty SET startdate='$startdate', enddate='$enddate' WHERE propertyid='$propertyid' ";

	if ($conn->query($sql) === TRUE) {
		die(header("location:../agentproperty.php?dates=true&id=$propertyid"));

	} else {
		//Insert fail
		die(header("location:../agentproperty.php?dates=false&id=$propertyid"));
	}


?>