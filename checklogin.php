<?php
	include "database.php";

	$tbl_name="users"; // Table name 

	// username and password sent from form 
	$myusername=$_POST['username']; 
	$mypassword=$_POST['password']; 

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysqli_real_escape_string($conn, $myusername);
	$mypassword = mysqli_real_escape_string($conn, $mypassword);
	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result = $conn->query($sql);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($result->num_rows ==1){

		while($row = $result->fetch_assoc()) {
			//Register sessions
        	$_SESSION['username'] = $row["username"];
        	$_SESSION['firstname'] = $row["first_name"];
        	$_SESSION['user_type'] = $row["user_type"];
    	}
    	if($_SESSION['user_type'] == 'A')
    		//redirect for usertype
			header("location:admin.php");
		if($_SESSION['user_type'] == 'C')
			header("location:customer.php");
		if($_SESSION['user_type'] == 'K')
			header("location:agent.php");
	}
	else {
		//redirect for error
		die(header("location:login.php?loginFailed=true"));
	}
?>