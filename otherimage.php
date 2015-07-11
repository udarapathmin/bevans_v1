<?php
	include "database.php";

   $tbl = $_GET['tbl'];
   $image_id = $_GET['id'];
   $col = $_GET['col'];

   $sql = "SELECT $col from $tbl where id = $image_id";

   $result = $conn->query($sql);

   while($row = $result->fetch_assoc()) {
      $image=$row[$col];
      header("content-type: image/jpeg");
      echo $image;
   }
?>