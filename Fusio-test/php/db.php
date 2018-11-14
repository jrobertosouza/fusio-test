<?php
	$host = "localhost";
	$userName = "drunpyag_adm";
	$password = "1merda";
	$dbName = "drunpyag_fusio";

	// Create database connection
	$conn = new mysqli($host, $userName, $password, $dbName);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>