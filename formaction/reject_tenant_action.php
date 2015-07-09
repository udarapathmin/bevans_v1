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


  $sql = "UPDATE tenant SET status='2' WHERE tappid='$id' ";

	if ($conn->query($sql) === TRUE) {

		die(header("location:../agenttenant.php?reject=true"));

	} else {
		//Insert to users table fail
		die(header("location:../agenttenant.php?reject=false"));
	}

?>