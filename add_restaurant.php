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

        <form action="action_save_restaurant.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="owner_username" value="<?=$_GET['username']?>">
            <label>Name:
                <input type="text" placeholder="Enter the name of restaurant" name="name" required>
            </label>
            <label>Description:
                <textarea rows="4" cols="50" name="description" required>Enter description here...</textarea>
            </label>
            <label>Local:
                <input type="text" placeholder="Enter the local of restaurant" name="local" required>
            </label>
            <label>Image:
                <input type="file" name="image">
            </label>
            <input type="submit" value="Add restaurant">
        </form>

    </body>
</html>
