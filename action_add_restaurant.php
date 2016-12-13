<?php
    session_start();
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/images.php');

    add_restaurant($_POST['name'], $_POST['description'], $_POST['local'], $_POST['owner_username']);
    $restaurant_id = $dbh->lastInsertId();
    add_owner_to_restaurant($restaurant_id, $_POST['owner_username']);



    add_image($_POST['name'], $restaurant_id);

    $id = $dbh->lastInsertId();

    $originalFileName = "images/originals/$id.jpg";
    $smallFileName = "images/thumbs_small/$id.jpg";
    $mediumFileName = "images/thumbs_medium/$id.jpg";

    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

    $original = imagecreatefromjpeg($originalFileName);

    $width = imagesx($original);
    $height = imagesy($original);
    $square = min($width, $height);

    // Create small square thumbnail
    $small = imagecreatetruecolor(200, 200);
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
    imagejpeg($small, $smallFileName);

    $mediumwidth = $width;
    $mediumheight = $height;

    if ($mediumwidth > 400) {
        $mediumwidth = 400;
        $mediumheight = $mediumheight * ( $mediumwidth / $width );
    }

    $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
    imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
    imagejpeg($medium, $mediumFileName);

    header("Location: userpage.php");

?>
