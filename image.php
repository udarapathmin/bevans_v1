<?php
	include "database.php";

   $image_id = $_GET['id'];
   $sql = "SELECT image from property_image where id = $image_id";

   $result = $conn->query($sql);

   while($row = $result->fetch_assoc()) {
      $image=$row['image'];
      header("content-type: image/jpeg");
      echo $image;
   }
?>