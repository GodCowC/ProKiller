<?php
	session_start();
	$host = "39.102.59.169"; /* Host name */
	$user = "root"; /* User */
	$password = "changke0328"; /* Password */
	$dbname = "root"; /* Database name */
	$conn = mysqli_connect($host, $user, $password, $dbname);
// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} ?>