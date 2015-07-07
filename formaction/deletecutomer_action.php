<?php

	include "../database.php";

	// $id = $_SESSION['deleteadminid'];
	$un = $_SESSION['username'];

	$sql = "DELETE FROM users WHERE username='$un'";

	$sql2 = "DELETE FROM customer WHERE username='$un'";

	//delete success
	if ($conn->query($sql2) === TRUE) {
	    if ($conn->query($sql) === TRUE) {
	    	session_start();
			session_destroy();
			die(header("location:../index.php?delete=true"));
	    } else {
	    	die(header("location:../index.php?delete=false"));
	    }
	} else {
	    die(header("location:../viewadmin.php?delete=false"));
	}

?>