<?php
// Simple (not secure) login using direct query
if (isset($_POST['username'])) {
	$uname = $_POST['username'];
	$pwd1 = $_POST['password'];

	require_once __DIR__ . '/connect.php'; // connects to 'restaurant'
	if (!isset($con) || !($con instanceof mysqli)) {
		die('Unable to connect..!!');
	}

	// Ensure user table exists; create if missing and seed minimal admin
	$con->query("CREATE TABLE IF NOT EXISTS `user` (\n      `id` INT AUTO_INCREMENT PRIMARY KEY,\n      `username` VARCHAR(50) NOT NULL UNIQUE,\n      `password` VARCHAR(255) NOT NULL\n    ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
	// Seed admin if table is empty
	$check = $con->query("SELECT COUNT(*) AS c FROM user");
	if ($check && ($row = $check->fetch_assoc()) && intval($row['c']) === 0) {
		$con->query("INSERT INTO user (username, password) VALUES ('admin', 'admin123')");
	}

	$q = "SELECT * FROM user WHERE username='$uname' AND password='$pwd1'";
	$result = mysqli_query($con, $q);
	if (!$result) {
		die('Query failed');
	}
	$num = mysqli_num_rows($result);

	if ($num == 1) {
		echo 'Login Successfully...!!';
		header('refresh:2; url=mainpage.html');
	} else {
		echo 'Failed to login';
	}
}
?>