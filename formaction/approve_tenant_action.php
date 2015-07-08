<?php 

  include "../database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Agent login
  if($_SESSION['user_type'] != 'K'){
    header("location:../index.php");
  }

    if(isset($_GET["id"]))
      $id = $_GET["id"];
    else
      header("location:index.php");

  $sql= "SELECT * FROM tenant WHERE tappid='$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      //TAPP id for ref
      $propertyid = $row["propertyid"];
      $customerid = $row["customerid"];

  }

  //Reject all other Tenant applications
  $sql = "UPDATE tenant SET status='2' WHERE propertyid='$propertyid' ";
  $conn->query($sql);

  $sql = "UPDATE tenant SET status='1' WHERE tappid='$id' ";

	if ($conn->query($sql) === TRUE) {
		//Update Customer ID to Tenant
		$sql = "UPDATE customer SET istenant='1' WHERE customerid='$customerid' ";
  		$conn->query($sql);

		//Update PRoperty ID to customer
		$sql = "UPDATE realestateproperty SET ownerid='$customerid' WHERE propertyid='$propertyid' ";
  		$conn->query($sql);

		die(header("location:../agenttenant.php?accept=true"));

	} else {
		//Insert to users table fail
		die(header("location:../agenttenant.php?accept=false"));
	}

?>