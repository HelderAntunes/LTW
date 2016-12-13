<?php
	session_start();
    include_once('database/connection.php');
    include_once('database/restaurants.php');

    if (!user_is_owner_of_restaurant($_SESSION['username'], $_POST['id'])) {
		$message = "invalid operation";
		echo "<script type='text/javascript'> alert('$message');  window.history.go(-1); </script>";
		exit;
    }

    remove_restaurant($_POST['id']);
    header("Location: userpage.php");
?>