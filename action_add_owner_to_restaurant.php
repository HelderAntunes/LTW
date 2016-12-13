<?php
	session_start();
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    if (!user_is_owner_of_restaurant($_SESSION['username'], $_POST['id'])) {
		$message = "invalid operation";
		echo "<script type='text/javascript'> alert('$message');  window.history.go(-1); </script>";
		exit;
    }

    if (user_is_owner_of_restaurant($_POST['username'], $_POST['id'])) {
        $_SESSION['error'] = "The user inserted is already a owner.";
        header('Location: add_owner_to_restaurant.php?id='.$_POST['id']);
        exit;
    } else if (!username_exists($_POST['username'])) {
        $_SESSION['error'] = "The user inserted don't exists.";
        header('Location: add_owner_to_restaurant.php?id='.$_POST['id']);
        exit;
    }
    add_owner_to_restaurant($_POST['id'], $_POST['username']);
    header("Location: view_restaurant.php?id=".$_POST['id']);
?>