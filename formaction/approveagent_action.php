<?php

	include "../database.php";

	// $id = $_SESSION['deleteadminid'];
	$id = $_SESSION['approveagentid'];

	$sql = "UPDATE agent SET active='1' WHERE agentid=$id ";

	//delete success
	if ($conn->query($sql) === TRUE) {
	    die(header("location:../pendingagents.php?approve=true"));
	} else {
	    die(header("location:../pendingagents.php?approve=false"));
	}

?>