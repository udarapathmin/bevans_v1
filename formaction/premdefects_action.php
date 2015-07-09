<?php
include "../database.php";

//Get POST Data
	$propertyid = $_POST['propertyid']; 
	$agentid = $_POST['agentid'];
	$customerid = $_POST['customerid']; 
	$subject = $_POST['subject'];
	$description = $_POST['description'];


    $image1 = $image2 = $image3 = "";

    if($_FILES['image1']['name'] != ""){
		$image1 = mysqli_escape_string($conn,file_get_contents($_FILES["image1"]["tmp_name"])); 
	} 
	if($_FILES['image2']['name'] != ""){
		$image2 = mysqli_escape_string($conn,file_get_contents($_FILES["image2"]["tmp_name"]));
	}
	if($_FILES['image3']['name'] != ""){
		$image3 = mysqli_escape_string($conn,file_get_contents($_FILES["image3"]["tmp_name"]));
	}

	$sql = "INSERT INTO  preliminary_defects (propertyid, agentid, customerid, subject, description, image1, image2, image3) 
					VALUES ('$propertyid', '$agentid', '$customerid', '$subject', '$description', '$image1', '$image2', '$image3')";



	if ($conn->query($sql) === TRUE) {
		die(header("location:../tenantproperty.php?report=true&id=$propertyid"));
	} else {
		//Insert to table fail
		die(header("location:../tenantproperty.php?report=false&id=$propertyid"));
	}
?>