<?php
	include "../database.php";
	$cid = $_SESSION['username'];
  
  	$sql="SELECT * FROM customer WHERE username = '$cid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
      $cid = $row['customerid'];
  	}

  	$propertyid = $_POST['propertyid']; 
	$agentid = $_POST['agentid'];

	$timeslot1 = $_POST['timeslot1'];  
	$timeslot2 = $_POST['timeslot2']; 
	$timeslot3 = $_POST['timeslot3']; 
	$time1 = $_POST['time1'];  
	$time2 = $_POST['time2']; 
	$time3 = $_POST['time3']; 

	//Setting Date Time Strings
	$tl1 = $timeslot1 . " " .$time1;
	$tl2 = $timeslot2 . " " .$time2;
	$tl3 = $timeslot3 . " " .$time3;

  	//Date Validations
  	$date1=date_create($timeslot1);
  	$date2=date_create($timeslot2);
  	$date3=date_create($timeslot3);
	$today=date_create(date('Y-m-d'));

	//Date1
	$diff1=date_diff($today,$date1);

	//Date2
	$diff2=date_diff($today,$date2);

	//Date3
	$diff3=date_diff($today,$date3);

	// $zero = $diff1->format("%a");
	// $neg = $diff1->format("%R%");



	//Date Validation
	if($diff1->format("%R%") != '+' ||  $diff1->format("%a") == '0' || $diff2->format("%R%") != '+' ||  $diff2->format("%a") == '0' ||$diff3->format("%R%") != '+' ||  $diff3->format("%a") == '0'){
  		die(header("location:../scheduleinspection.php?id=$propertyid&agid=$agentid&error=true"));
  	} else {
  		$sql = "INSERT INTO customer_scheduleinspection (customerid, propertyid, agentid, timeslot1, timeslot2, timeslot3) 
  				VALUES ('$cid', '$propertyid', '$agentid', '$tl1', '$tl2', '$tl3')";
  		if ($conn->query($sql) === TRUE) {
		    die(header("location:../scheduleinspection.php?id=$propertyid&agid=$agentid&success=true"));
		} else {
		    die(header("location:../scheduleinspection.php?id=$propertyid&agid=$agentid&test=true"));
		}
  	}

?>