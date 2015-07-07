<?php
	include "../database.php";

	$time = $_POST['options'];
	$id = $_POST['id'];

	if($time == '2'){
		$sql = "UPDATE customer_scheduleinspection SET agentreply='2',time='Not Acceptable' WHERE id=$id ";

		if ($conn->query($sql) === TRUE) {
			die(header("location:../scheduleapplications.php?reply=true"));

		} else {
			//Insert to users table fail
			die(header("location:../scheduleapplications.php?reply=true"));
		}
	}  else{
		$sql = "UPDATE customer_scheduleinspection SET agentreply='1',time='$time' WHERE id=$id ";

		if ($conn->query($sql) === TRUE) {
			die(header("location:../scheduleapplications.php?reply=true"));

		} else {
			//Insert to users table fail
			die(header("location:../scheduleapplications.php?reply=false"));
		}
	}
	

?>