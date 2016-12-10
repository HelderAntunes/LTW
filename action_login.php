<?php
	session_start();
	include_once("config/config.php");
	include_once('database/connection.php');
	include_once('database/users.php');

	if (username_password_exists($_POST['username'], $_POST['password'])) {
		$_SESSION['username'] = $_POST['username'];
		header('Location: userpage.php');
	} else {
		$_SESSION['error'] = "Error: username or password wrong!";
		header('Location: login.php');
		exit;
	}

?>
