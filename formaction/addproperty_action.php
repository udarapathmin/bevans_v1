<?php
	include "../database.php";

	//Get POST Data
	$propertytype = $_POST['propertytype']; 
	$houseno = $_POST['houseno'];
	$street1 = $_POST['addstreet1'];  
	$street2 = $_POST['addstreet2']; 
	$suburb = $_POST['addsuburb']; 
	$state = $_POST['addstate']; 
	$postcode = $_POST['addpostcode'];  
	$ownerfee = $_POST['ownerfee']; 
	$rent = $_POST['rent']; 
	$bond = $_POST['bond']; 
	$bondperiod = $_POST['bondperiod']; 
	$downpayment = $_POST['downpayment'];  
	$inspectiontype = $_POST['inspectiontype']; 
	$smokingallowed = $_POST['smokingallowed']; 
	$petsallowed = $_POST['petsallowed'];
	$furnishedstatus = $_POST['furnishedstatus']; 
	$suitablefor = $_POST['suitablefor']; 
	$status = $_POST['status']; 
	$comments = $_POST['comments']; 

	//features array
	$intfeatures ="";
	if(isset($_POST['interiorfeatures'])){
		$interiorfeatures = $_POST['interiorfeatures'];
		//Create string for interior features
		foreach ($interiorfeatures as $fc){
			$intfeatures = $intfeatures . $fc . ",";
		} 
	}

	$extfeatures ="";
	if(isset($_POST['exteriorfeatures'])){
		$exteriorfeatures = $_POST['exteriorfeatures'];
		//Create string for Exterior features
		foreach ($exteriorfeatures as $fc){
			$extfeatures = $extfeatures . $fc . ",";
		}
	}

	$othrfeatures ="";
	if(isset($_POST['otherfeatures'])){
		$otherfeatures = $_POST['otherfeatures'];
		//Create string for other features
		foreach ($otherfeatures as $fc){
			$othrfeatures =  $othrfeatures . $fc . ",";
		}
	}
	

	//Add Property
	$sql = "INSERT INTO realestateproperty (propertytype, houseno, street1, street2, suburb, state, postcode, ownerfee, rent, bond, bondperiod, downpayment, inspectiontype, smokingallowed, petsallowed, furnishedstatus, suitablefor, status, comments, interiorfeatures, exteriorfeatures, otherfeatures) 
					VALUES ('$propertytype', '$houseno', '$street1', '$street2', '$suburb', '$state', '$postcode', '$ownerfee', '$rent', '$bond', '$bondperiod', '$downpayment', '$inspectiontype', '$smokingallowed', '$petsallowed', '$furnishedstatus', '$suitablefor', '$status', '$comments', '$intfeatures', '$extfeatures', '$othrfeatures')";

	if ($conn->query($sql) === TRUE) {
		
		 $last_id = $conn->insert_id;
		 //Image Handle
		if(isset($_FILES['images'])){
			foreach ($_FILES["images"]["error"] as $key => $error) {
			    if ($error == UPLOAD_ERR_OK) {
			        $tmp_name = $_FILES["images"]["tmp_name"][$key];
			        $name = $_FILES["images"]["name"][$key];
			        $file = mysqli_escape_string($conn,file_get_contents($_FILES["images"]["tmp_name"][$key]));

			        $sqlimg = "INSERT INTO property_image (propertyid,name,image) 
			        			VALUES ('$last_id', '$name', '$file') ";
			        $conn->query($sqlimg);
			    }
			}
		}

		die(header("location:../addproperty.php?add=true"));
	} else {
		//Insert to users table fail
		die(header("location:../addproperty.php?add=false"));
		// echo "faol to inserted";
	}


?>