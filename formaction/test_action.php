<?php

include "../database.php";
include "../template/config.php";

// $file = $_FILES['file1'];

// $name = "A".$file['name'];	


// $path =  "uploads/" . basename($name);
// $wholepath =  $baseurl ."uploads/" . basename($name);
// // $sql = "INSERT INTO tenant_files (proofidentity) VALUES ('" . mysqli_real_escape_string($conn,$wholepath) . "')";
// // if (move_uploaded_file($file['tmp_name'], $path)) {
// //     echo "Move succeed.";
// // } else {
// //     echo "Move failed. Possible duplicate?";
// // }

// // $conn->query($sql);
$wholepath1  = $wholepath2 = "A";

if($_FILES['file1']['name'] != "") {
	$file = $_FILES['file1'];
	$name = "A".$file['name'];	
	$path =  "uploads/" . basename($name);
	$wholepath1 =  $baseurl ."uploads/" . basename($name);
}

if($_FILES['file2']['name'] != ""){
	$file2 = $_FILES['file2'];
	$name1 = "A".$file2['name'];	
	$path =  "uploads/" . basename($name1);
	$wholepath2 =  $baseurl ."uploads/" . basename($name1);
}

echo "$wholepath1" . "<br>";
echo "$wholepath2" . "<br>";

?>