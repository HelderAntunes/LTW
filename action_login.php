<?php
	session_start();
	include_once("config/config.php");
	include_once('database/connection.php');
	include_once('database/users.php');

	$username = trim(strip_tags($_POST['username']));
  	$password = $_POST['password'];  

	if (username_password_exists($username, $password)) {
		$_SESSION['username'] = $username;
		header('Location: userpage.php');
	} else {
		$_SESSION['error'] = "Error: username or password wrong!";
		header('Location: login.php');
	}

?>
