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
        <form action="action_sigin.php" method="post">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label><b>Email</b></label>
            <input type="email" placeholder="Enter your email" name="email" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <label><b>Birthday</b></label>
            <input type="date" name="birthdate">
            <label><b>User type</b></label>
            <input type="radio" name="usertype" value="owner" checked="checked">Owner
            <input type="radio" name="usertype" value="reviewer">Reviewer
            <button type="submit">Create account</button>
        </form>
        <?php
            if(isset($_POST['user_exists'])){ ?>
                <strong>Wrong login data.</strong>
            <?php }
        ?>
        <a href="<?php echo $environment; ?>/login.php">Go Home</a>
    </body>
</html>
