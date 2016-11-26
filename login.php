<?php
    include_once("config/config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <h1>FoodBook</h1>
        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>
        <form action="action_login.php" method="post">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <a href="<?php echo $environment; ?>/login.php">Go Home</a>
        No account?<a href="<?php echo $environment; ?>/register.php">Create one!</a>
    </body>
</html>
