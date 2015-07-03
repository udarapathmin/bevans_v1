<?php

	include "../database.php";

	// $id = $_SESSION['deleteadminid'];
	$id = $_SESSION['deleteadminid'];

	$sql = "DELETE FROM users WHERE id='$id'";

	//delete success
	if ($conn->query($sql) === TRUE) {
	    die(header("location:../listadmin.php?delete=true"));
	} else {
	    die(header("location:../viewadmin.php?delete=false"));
	}

?>