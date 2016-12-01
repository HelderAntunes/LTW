<?php

    /**
     * Add a image to database.
     */
    function add_image($title, $restaurant_id) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO images (id, title, restaurant_id)
                                    VALUES (NULL, :title, :restaurant_id)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':restaurant_id', $restaurant_id);

            $stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Get images of a restaurant.
     */
    function get_images_of_restaurant($restaurant_id) {
        global $dbh;

        try {
            $stmt = $dbh->prepare('SELECT * FROM images WHERE restaurant_id = ?');
            $stmt->execute(array($restaurant_id));
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

?>
