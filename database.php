<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bevens";

$baseurl = "http://localhost/rental/";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>