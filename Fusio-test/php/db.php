<?php
	// Add your info here
	$host = "localhost";
	$userName = "adm"; 
	$password = "1234";
	$dbName = "fusio";

	// Create database connection
	$conn = new mysqli($host, $userName, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>