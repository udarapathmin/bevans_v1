<?php

	include "../database.php";

	// $id = $_SESSION['deleteadminid'];
	$id = $_GET['id'];
	$cid = $_SESSION['username'];
	
	$sql="SELECT * FROM customer WHERE username = '$cid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
    	$cid = $row['customerid'];
    }

    $sql="SELECT * FROM customer_save WHERE customerid = '$cid' AND propertyid='$id'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
    	$sql = "INSERT INTO customer_save (customerid, propertyid) VALUES ('$cid', '$id')";

		//success
		if ($conn->query($sql) === TRUE) {
		    die(header("location:../advancesearch.php?save=true"));
		} else {
		    die(header("location:../advancesearch.php?save=false"));
		}
    } else {
    	die(header("location:../advancesearch.php?save=false"));
    }


	

?>