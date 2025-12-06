<?php

	$duser = 'root';
	$dpass = '';
	$db = 'restaurant';

	// First connect without specifying a database
	$con = new mysqli('localhost', $duser, $dpass);
	if ($con->connect_error) {
		die('Unable to connect..!!');
	}

	// Create database if it doesn't exist, then select it
	$con->query("CREATE DATABASE IF NOT EXISTS `$db`");
	if (!$con->select_db($db)) {
		die('Unable to select database..!!');
	}
	
// echo "connected..!!"; // suppress output to avoid interfering with headers



?>