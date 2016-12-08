<?php
    include_once("config/config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Bungee|Indie+Flower" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <h1>FoodBook</h1>
        </div>
        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>
        <form action="action_login.php" method="post">
            <label><b>Username:</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
            <label><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
        </form>
     
        <a href="<?php echo $environment; ?>/login.php">Go Home</a>
        <div id="registerLink">
             <a href="<?php echo $environment; ?>/register.php">No account? Create one!</a>
        </div>
    
    </body>
</html>
