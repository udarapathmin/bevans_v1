<?php

include "../database.php";
include "../template/config.php";

$file = $_FILES['file1'];

$name = "A".$file['name'];	


$path =  "uploads/" . basename($name);
$wholepath =  $baseurl ."uploads/" . basename($name);
$sql = "INSERT INTO tenant_files (proofidentity) VALUES ('" . mysqli_real_escape_string($conn,$wholepath) . "')";
if (move_uploaded_file($file['tmp_name'], $path)) {
    echo "Move succeed.";
} else {
    echo "Move failed. Possible duplicate?";
}

$conn->query($sql);

?>