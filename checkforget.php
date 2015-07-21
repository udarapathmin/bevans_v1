<?php
	include "database.php";

	$tbl_name="users"; // Table name 

	// username and password sent from form 
	$email=$_POST['email']; 

	// To protect MySQL injection (more detail about MySQL injection)
	$email = stripslashes($email);
	$email = mysqli_real_escape_string($conn, $email);
	$sql="SELECT * FROM $tbl_name WHERE email='$email'";
	$result = $conn->query($sql);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($result->num_rows ==1){

		while($row = $result->fetch_assoc()) {
			//Register sessions
        	$email= $row["email"];
        	$password= $row["password"];
    	}
    	// the message
		$msg = "Your Password for Bevans is " . $password . "\n Please Reset your password after login.";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		mail($email,"Recover Password",$msg);

		//redirect for success
		die(header("location:forgot.php?email=true"));

	}
	else {
		echo "e";

		//redirect for error
		die(header("location:forgot.php?email=false"));
	}
?>