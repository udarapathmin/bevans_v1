<?php

	include "../database.php";

	// $id = $_SESSION['deleteadminid'];
	$id = $_SESSION['deleteschedule'];

	$pid=$_GET["id"];
	$agid = $_GET["agid"];

	$sql = "DELETE FROM customer_scheduleinspection WHERE id='$id'";

	//delete success
	if ($conn->query($sql) === TRUE) {
	    die(header("location:../scheduleinspection.php?delete=true&id=$pid&agid=$agid"));
	} else {
	    die(header("location:../scheduleinspection.php?delete=false&id=$pid&agid=$agid"));
	}

?>