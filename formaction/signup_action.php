<?php
	include "../database.php";

	//Get POST Data
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];  
	$email = $_POST['email']; 
	$firstname = $_POST['firstname']; 
	$othername = $_POST['othername']; 
	$lastname = $_POST['lastname']; 
	$phone = $_POST['phone']; 

	$agent = false;
	if(isset($_POST['agent'])){
		$agent = true;
	}

	//Check for Password Validation
	if($password != $cpassword){
		die(header("location:../signup.php?password=true&username=false&telephone=false"));
	}

	//check for valid username
	$bool = true;
	$sql="SELECT * FROM users WHERE username='$username'";
	$result = $conn->query($sql);
	if($result->num_rows ==1){
		$bool = false;
	}

	if(!$bool){
		die(header("location:../signup.php?username=true&password=false&telephone=false"));
	}

	//check for phone no
	if(strlen($phone) != 10){
		die(header("location:../signup.php?username=true&password=false&telephone=true"));
	}

	//Set User type
	if($agent == true){
		$usert = "K";
		$tbl = "agent";
	} else{
		$usert = "C";
		$tbl = "customer";
	}
	//Validations true
	//Create User Account first
	$sqluseacc = "INSERT INTO users (username, password, first_name, last_name, user_type, email) 
					VALUES ('$username', '$password', '$firstname', '$lastname', '$usert', '$email')";
	if ($conn->query($sqluseacc) === TRUE) {
		$sql="SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		$userid = 0;
		while($row = $result->fetch_assoc()) {
			$userid = $row["id"];
		}
		//DB Insert Customer Tables
		$sqlcustomer= "INSERT INTO $tbl (user_id, username, firstname, othername, lastname, email, phonemobile) 
			VALUES ('$userid', '$username', '$firstname', '$othername', '$lastname', '$email', '$phone')";
		if ($conn->query($sqlcustomer) === TRUE) {
			//Register sessions
        	$_SESSION['username'] = $username;
        	$_SESSION['firstname'] = $firstname;
        	$_SESSION['user_type'] = $usert;

        	if($usert == 'K'){
        		die(header("location:../agent.php?signup=true"));
        	} else{
				die(header("location:../customer.php?signup=true"));
			}
		} else {
			//Insert to customer table fail
			die(header("location:../signup.php?signup=false"));
		}
	} else {
		//Insert to users table fail
		die(header("location:../signup.php"));
	}
?>