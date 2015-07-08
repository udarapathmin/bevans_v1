<?php

include "../database.php";

	//Get POST Data Basic Data
	$propertyid = $_POST['propertyid']; 
	$customerid = $_POST['customerid'];
	$cus_title = $_POST['cus_title'];  
	$cus_dob = $_POST['cus_dob']; 
	$cus_gender = $_POST['cus_gender']; 
	$cus_driverlicense = $_POST['cus_driverlicense']; 
	$cus_driverlicensestate = $_POST['cus_driverlicensestate'];
	$cus_passportno = $_POST['cus_passportno']; 
	$cus_passportcountry = $_POST['cus_passportcountry']; 
	$cus_pentionno = $_POST['cus_pentionno']; 
	$cus_carmake = $_POST['cus_carmake']; 
	$cus_carno = $_POST['cus_carno']; 
	$cus_occupants_adults = $_POST['cus_occupants_adults']; 
	$cus_occupants_children = $_POST['cus_occupants_children']; 
	$smoker = $_POST['smoker']; 
	$havepets = $_POST['havepets'];

	//Current Residential 
	$c_addno = $_POST['c_addno']; 
	$c_street1 = $_POST['c_street1'];
	$c_street2 = $_POST['c_street2'];  
	$c_suburb = $_POST['c_suburb']; 
	$c_state = $_POST['c_state']; 
	$c_postcode = $_POST['c_postcode']; 
	$c_time = $_POST['c_time'];
	$c_rent = $_POST['c_rent']; 
	$c_landlord_name = $_POST['c_landlord_name']; 
	$c_landlord_phone = $_POST['c_landlord_phone']; 
	$c_reasontoleave = $_POST['c_reasontoleave']; 
	
	//Past Reseidential
	$p_addno = $_POST['p_addno']; 
	$p_street1 = $_POST['p_street1'];
	$p_street2 = $_POST['p_street2'];  
	$p_suburb = $_POST['p_suburb']; 
	$p_state = $_POST['p_state']; 
	$p_postcode = $_POST['p_postcode']; 
	$p_time = $_POST['p_time'];
	$p_rent = $_POST['p_rent']; 
	$p_landlord_name = $_POST['p_landlord_name']; 
	$p_landlord_phone = $_POST['p_landlord_phone']; 
	$p_reasontoleave = $_POST['p_reasontoleave']; 
	//Specia
	$p_bondrefunded = $_POST['p_bondrefunded'];

	//Employeement Details
	//Current
	$em_c_occupation = $_POST['em_c_occupation']; 
	$em_c_post= $_POST['em_c_post'];
	$em_c_addno = $_POST['em_c_addno']; 
	$em_c_street1 = $_POST['em_c_street1'];
	$em_c_street2 = $_POST['em_c_street2'];  
	$em_c_suburb = $_POST['em_c_suburb']; 
	$em_c_state = $_POST['em_c_state']; 
	$em_c_postcode = $_POST['em_c_postcode'];
	$em_c_payrollmanager_name = $_POST['em_c_payrollmanager_name'];
	$em_c_payrollmanager_phone = $_POST['em_c_payrollmanagerphone'];  
	$em_c_lof = $_POST['em_c_lof']; 
	$em_c_netincome = $_POST['em_c_netincome']; 
	$em_c_type = $_POST['em_c_type']; 

	//Previous
	$em_p_occupation = $_POST['em_p_occupation']; 
	$em_p_post= $_POST['em_p_post'];
	$em_p_addno = $_POST['em_p_addno']; 
	$em_p_street1 = $_POST['em_p_street1'];
	$em_p_street2 = $_POST['em_p_street2'];  
	$em_p_suburb = $_POST['em_p_suburb']; 
	$em_p_state = $_POST['em_p_state']; 
	$em_p_postcode = $_POST['em_p_postcode'];
	$em_p_payrollmanager_name = $_POST['em_p_payrollmanager_name'];
	$em_p_payrollmanager_phone = $_POST['em_p_payrollmanager_phone'];  
	$em_p_lof = $_POST['em_p_lof']; 
	$em_p_netincome = $_POST['em_p_netincome']; 
	$em_p_type = $_POST['em_p_type']; 

	//References
	//Ref1
	$ref1_firstname = $_POST['ref1_firstname'];
	$ref1_lastname = $_POST['ref1_lastname'];  
	$ref1_phone = $_POST['ref1_phone']; 
	$ref1_relationship = $_POST['ref1_relationship']; 

	//Ref2
	$ref2_firstname = $_POST['ref2_firstname'];
	$ref2_lastname = $_POST['ref2_lastname'];  
	$ref2_phone = $_POST['ref2_phone']; 
	$ref2_relationship = $_POST['ref2_relationship'];

	//Emergency Details
	$emg_firstname = $_POST['emg_firstname'];
	$emg_lastname = $_POST['emg_lastname'];  
	$emg_relationship = $_POST['emg_relationship'];
	$emg_phonemobile = $_POST['emg_phonemobile']; 
	$emg_phonehome = $_POST['emg_phonehome'];
	$emg_tenancystatus = $_POST['emg_tenancystatus'];  
	$emg_deptlandlord = $_POST['emg_deptlandlord']; 
	$emg_reasonsforpayments = $_POST['emg_reasonsforpayments'];


	//Add Tenant Application
	$sql = "INSERT INTO tenant (propertyid, customerid, cus_title, cus_dob, cus_gender, cus_driverlicense, cus_driverlicensestate, 
								cus_passportno, cus_passportcountry, cus_pentionno, cus_carmake, cus_carno, cus_occupants_adults, 
								cus_occupants_children, smoker, havepets) 
					VALUES ('$propertyid', '$customerid', '$cus_title', '$cus_dob', '$cus_gender', '$cus_driverlicense', '$cus_driverlicensestate', '$cus_passportno', 
						'$cus_passportcountry', '$cus_pentionno', '$cus_carmake', '$cus_carno', '$cus_occupants_adults', '$cus_occupants_children', '$smoker', '$havepets')";



	if ($conn->query($sql) === TRUE) {
		$tappid = $conn->insert_id;

		//tenant_residential
		$sql_cresi = "INSERT INTO tenant_residential (tappid, currentorpast, addno, street1, street2, suburb, state, postcode, time, rent, 
								landlord_name, landlord_phone,reasontoleave,bondrefunded)
				VALUES ('$tappid', 'C', '$c_addno', '$c_street1', '$c_street2', '$c_suburb','$c_state', '$c_postcode', '$c_time', 
					'$c_rent', '$c_landlord_name', '$c_landlord_phone', '$c_reasontoleave', '0')" ;

		
		$sql_presi = "INSERT INTO tenant_residential (tappid, currentorpast, addno, street1, street2, suburb, state, postcode, time, rent, 
								landlord_name, landlord_phone,reasontoleave,bondrefunded)
				VALUES ('$tappid', 'P', '$p_addno', '$p_street1', '$p_street2', '$p_suburb','$p_state', '$p_postcode', '$p_time', 
					'$p_rent', '$p_landlord_name', '$p_landlord_phone', '$p_reasontoleave', '$p_bondrefunded')" ;

		//Previous Insert
		$conn->query($sql_presi);

		//Current Insert
		$conn->query($sql_cresi);

		//tenant_empdetails
		$sql_emp_c = "INSERT INTO tenant_empdetails (tappid, currentorpast, occupation, post,  addno, street1, street2, suburb, 
					state, postcode,payrollmanager_name, payrollmanager_phone, lof,netincome, type)
					VALUES('$tappid', 'C', '$em_c_occupation', '$em_c_post', '$em_c_addno', '$em_c_street1','$em_c_street2', 
						'$em_c_suburb', '$em_c_state', '$em_c_postcode', '$em_c_payrollmanager_name', '$em_c_payrollmanager_phone', 
						'$em_c_lof', '$em_c_netincome', '$em_c_type')";

		$sql_emp_p = "INSERT INTO tenant_empdetails (tappid, currentorpast, occupation, post,  addno, street1, street2, suburb, 
					state, postcode,payrollmanager_name, payrollmanager_phone, lof,netincome, type)
					VALUES('$tappid', 'P', '$em_p_occupation', '$em_p_post', '$em_p_addno', '$em_p_street1','$em_p_street2', 
						'$em_p_suburb', '$em_p_state', '$em_p_postcode', '$em_p_payrollmanager_name', '$em_p_payrollmanager_phone', 
						'$em_p_lof', '$em_p_netincome', '$em_p_type')";


		$conn->query($sql_emp_c);
		$conn->query($sql_emp_p);

		//Referemces Add
		$sql_ref1 = "INSERT INTO tenant_references (tappid, refid, firstname, lastname, phone, relationship) 
					VALUES ('$tappid', '1', '$ref1_firstname', '$ref1_lastname', '$ref1_phone', '$ref1_relationship')"; 

		$sql_ref2 = "INSERT INTO tenant_references (tappid, refid, firstname, lastname, phone, relationship) 
					VALUES ('$tappid', '2', '$ref2_firstname', '$ref2_lastname', '$ref2_phone', '$ref2_relationship')";

		$conn->query($sql_ref1);
		$conn->query($sql_ref2);

		$sql_emg = "INSERT INTO tenant_emergency (tappid,firstname, lastname, relationship, phonemobile, phonehome, tenancystatus, deptlandlord, reasonsforpayments)
				VALUES ('$tappid', '$emg_firstname', '$emg_lastname', '$emg_relationship', '$emg_phonemobile', '$emg_phonehome','$emg_tenancystatus', '$emg_deptlandlord', '$emg_reasonsforpayments')";

		$conn->query($sql_emg);

		//File Upload
		$f1 = $f2 = $f3 = $f4 = $f5 = $f6 = $f7 = $f8 = $f9 = '';  
		//concat to names
		$fname = $propertyid ."-". $customerid;

		//file1
		if(isset($_FILES['proofidentity'])){
			$file_proofidentity = $_FILES['proofidentity'];
			$name_f1 = $fname . $file_proofidentity['name'];

			$path =  "uploads/" . basename($name_f1);
			move_uploaded_file($file_proofidentity['tmp_name'], $path);

			$f1 =  $baseurl ."formaction/uploads/" . basename($name_f1);
		}

		//file2
		if(isset($_FILES['proofincome_centerlink'])){
			$file_proofincome_centerlink = $_FILES['proofincome_centerlink'];
			$name_f2 = $fname . $file_proofincome_centerlink['name'];

			$path =  "uploads/" . basename($name_f2);
			move_uploaded_file($file_proofincome_centerlink['tmp_name'], $path);

			$f2 =  $baseurl ."formaction/uploads/" . basename($name_f2);
		}
		
		//file3
		if(isset($_FILES['proofincome_bank'])){
			$file_proofincome_bank= $_FILES['proofincome_bank'];
			$name_f3 = $fname . $file_proofincome_bank['name'];

			$path =  "uploads/" . basename($name_f3);
			move_uploaded_file($file_proofincome_bank['tmp_name'], $path);

			$f3 =  $baseurl ."formaction/uploads/" . basename($name_f3);
		}
		
		//file4
		if(isset($_FILES['spdoc_currentrentloger'])){
			$file_spdoc_currentrentloger = $_FILES['spdoc_currentrentloger'];
			$name_f4 = $fname . $file_spdoc_currentrentloger['name'];

			$path =  "uploads/" . basename($name_f4);
			move_uploaded_file($file_spdoc_currentrentloger['tmp_name'], $path);

			$f4 =  $baseurl ."formaction/uploads/" . basename($name_f4);
		}
		
		//file5
		if(isset($_FILES['spdoc_rentalreciept'])){
			$file_spdoc_rentalreciept = $_FILES['spdoc_rentalreciept'];
			$name_f5 = $fname . $file_spdoc_rentalreciept['name'];

			$path =  "uploads/" . basename($name_f5);
			move_uploaded_file($file_spdoc_rentalreciept['tmp_name'], $path);

			$f5 =  $baseurl ."formaction/uploads/" . basename($name_f5);
		}
		
		//file6
		if(isset($_FILES['spdoc_references'])){
			$file_spdoc_references = $_FILES['spdoc_references'];
			$name_f6 = $fname . $file_spdoc_references['name'];

			$path =  "uploads/" . basename($name_f6);
			move_uploaded_file($file_spdoc_references['tmp_name'], $path);

			$f6 =  $baseurl ."formaction/uploads/" . basename($name_f6);
		}
		
		//file7
		if(isset($_FILES['spdoc_ratenotice'])){
			$file_spdoc_ratenotice = $_FILES['spdoc_ratenotice'];
			$name_f7 = $fname . $file_spdoc_ratenotice['name'];

			$path =  "uploads/" . basename($name_f7);
			move_uploaded_file($file_spdoc_ratenotice['tmp_name'], $path);

			$f7 =  $baseurl ."formaction/uploads/" . basename($name_f7);
		}
		

		//file8
		if(isset($_FILES['spdoc_vehiclereg'])){
			$file_spdoc_vehiclereg = $_FILES['spdoc_vehiclereg'];
			$name_f8 = $fname . $file_spdoc_vehiclereg['name'];

			$path =  "uploads/" . basename($name_f8);
			move_uploaded_file($file_spdoc_vehiclereg['tmp_name'], $path);

			$f8 =  $baseurl ."formaction/uploads/" . basename($name_f8);
		}

		//file9
		if(isset($_FILES['spdoc_elecorphone'])){
			$file_spdoc_elecorphone = $_FILES['spdoc_elecorphone'];
			$name_f9 = $fname . $file_spdoc_elecorphone['name'];

			$path =  "uploads/" . basename($name_f9);
			move_uploaded_file($file_spdoc_elecorphone['tmp_name'], $path);

			$f9 =  $baseurl ."formaction/uploads/" . basename($name_f9);
		}
		
		$sqlfiles = "INSERT INTO tenant_files (tappid, proofidentity, proofincome_centerlink, proofincome_bank, 
				spdoc_currentrentloger, spdoc_rentalreciept, spdoc_references, spdoc_ratenotice, spdoc_vehiclereg, spdoc_elecorphone) 
				VALUES ('$tappid', '" . mysqli_real_escape_string($conn,$f1) . "', '" . mysqli_real_escape_string($conn,$f2) . "', '" . mysqli_real_escape_string($conn,$f3) . "', '" . mysqli_real_escape_string($conn,$f4) . "', '" . mysqli_real_escape_string($conn,$f5) . "', '" . mysqli_real_escape_string($conn,$f6) . "', '" . mysqli_real_escape_string($conn,$f7) . "', '" . mysqli_real_escape_string($conn,$f8) . "', '" . mysqli_real_escape_string($conn,$f9) . "')";

		
		$conn->query($sqlfiles);


		die(header("location:../submitedtenants.php?submit=true&id=$propertyid"));
	} else{
		die(header("location:../submitedtenants.php?submit=true&id=$propertyid"));
	}


?>