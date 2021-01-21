<?php
	$servername = "premium81.web-hosting.com";
	$username = "broofiix_brooks";
	$password = "YlYRPEgI9M#p";
	$db = "broofiix_hotel";

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
session_start();
?>
  
  