<?php
    session_start();
    include_once("config/config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <h1>FoodBook</h1>
        </div>
        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>
        <?php if (isset($_SESSION['error'])) { ?>
            <span id="error">
                <p><?=$_SESSION['error']?></p>
            </span>
        <?php unset($_SESSION['error']); }?>
        <form action="action_sigin.php" method="post">
            <label><b>Username:</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label><b>Email:</b></label>
            <input type="email" placeholder="Enter your email" name="email" required>
            <label><b>Password:</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <label><b>Birthday</b></label>
            <input type="date" name="birthdate">
            <button id="register_btn" type="submit">Create account</button>
        </form>
        
        <a href="<?php echo $environment; ?>/login.php">Go Home</a>
    </body>
</html>
