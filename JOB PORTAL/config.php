<?php 
	session_start();
	// connect to database [xampp]
	$conn = mysqli_connect("localhost", "root", "", "job_portal");

	if (!$conn) {
		die("Error! Couldn't connect to database: " . mysqli_connect_error());
	}
?>